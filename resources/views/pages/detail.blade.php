
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/Images1/titleWebKimDong.png') }}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/myStyle.css')}}" rel="stylesheet">
<style>
           .carousel-inner img {
        max-width: 550px;
        max-height: 550px;
        margin: auto;
    }

    .carousel-indicators {
        display: flex;
        justify-content: center;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-left: 0;
        margin-right: 15%;
        margin-left: 15%;
        margin-top: 20px;
    }

    .carousel-indicators li {
        width: 100px;
        height: 100px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 5px;
    }

    .carousel-indicators li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .carousel-indicators li.active {
        border: 2px solid #007bff;
    }

    .carousel-indicators li:hover {
        border: 2px solid #007bff;
    }
</style>
</head>

<body>
    <!-- Topbar Start -->
    @include('backend.dashboard.component.header')
    <!-- Topbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi Tiết Sản Phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Trang chi tiết</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
   
    <div class="container-fluid py-5">
        <div class="row px-xl-5">   
            <div class="col-lg-5 pb-5">
                <!-- Start Thông tin shop detail -->
                @if ($products)
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('frontend/Images1/'.$products->AnhDaiDien) }}" alt="Product Image" style="max-width: 550px; max-height: 550px;">
                        </div>
                        @foreach($anhnho as $anh)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('frontend/Images1/'.$anh->TenFileAnh) }}" alt="Product Image" style="max-width: 550px; max-height: 550px;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>

                    <!-- Thumbnails -->
                    <ol class="carousel-indicators mt-3">
                        <li data-target="#product-carousel" data-slide-to="0" class="active">
                            <img class="d-block w-100" src="{{ asset('frontend/Images1/'.$products->AnhDaiDien) }}" alt="Thumbnail Image" style="width: 100px; height: 100px;">
                        </li>
                        @foreach($anhnho as $index => $anh)
                            <li data-target="#product-carousel" data-slide-to="{{ $index + 1 }}">
                                <img class="d-block w-100" src="{{ asset('frontend/Images1/'.$anh->TenFileAnh) }}" alt="Thumbnail Image" style="width: 100px; height: 100px;">
                            </li>
                        @endforeach
                    </ol>
                </div>
                @endif
            </div>
            
            
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$products->TenSach}}</h3>
                <div class="d-flex mb-3">
                    @php
                        $sumRating = 0;
                        $count = $danhgiakhs->count();
            
                        foreach ($danhgiakhs as $danhgiakh) {
                            $sumRating += $danhgiakh->Vote;
                        }
            
                        if ($count > 0) {
                            $averageRating = $sumRating / $count;
                        } else {
                            $averageRating = 0;
                        }
                        $roundedRating = round($averageRating * 2) / 2;
                    @endphp
                    <div class="text-primary mb-2">
                        @for ($i = 0; $i < 5; $i++)
                        @if ($i < $roundedRating)
                            @if ($roundedRating - $i >= 1)
                                <i class="fas fa-star"></i> <!-- Hiển thị sao đầy -->
                            @else
                                <i class="fas fa-star-half-alt"></i> <!-- Hiển thị nửa sao -->
                            @endif
                        @else
                            <i class="far fa-star"></i> <!-- Hiển thị sao trống -->
                        @endif
                    @endfor
                    </div>
                    <small class="pt-1">({{ $count }} Đánh giá)</small>
                </div>
                <p class="font-weight-semi-bold mb-4">Nhà xuất bản : <span> {{$productNXB->TenNXB}}</span></p>
                @if ($products->SoLuong == 0)
                    <style>
                        .out-product {
                            font-size: 20px;
                            width: 300px;
                            background: rgb(209, 156, 151);
                            color: white;
                            text-align: center;
                            border: 1px solid black;
                        }
                    </style>
                   <p class="mb-4 out-product">Tạm hết hàng</p>
                @else
                    <p class="mb-4">Số lượng còn: {{ $products->SoLuong }}</p> 
                    <h4 class="font-weight-semi-bold mb-4">Giá bán : {{$products->GiaBan}}VND</h4>
                @endif
                <div style="display: inline;font-size: 15px">
                    <div style="display: flex">
                        <p>Thời gian giao hàng : <p style="margin-left: 20px">Giao hàng đến</p> <a href="#" style="margin-left: 20px">Thay đổi</a></p><br>
                    </div>
                   <div style="display: flex">
                    <p>Chính sách đổi trả : <p style="margin-left: 20px">Đổi trả sản phẩm trong 30 ngày</p> <a href="#" style="margin-left: 20px">Xem thêm</a></p>
                   </div>
                </div>
                 <!-- end Thông tin shop detail//////////////////////////////////////////////////// -->



                
                <div class="d-flex align-items-center mb-4 pt-2">
                    @if ($products->SoLuong == 0)
                    <style>
                        .contact-product{
                            background-color: rgb(209, 156, 151);
                            width: 250px;
                            color: black;
                            text-align: center;
                            font-size: 1rem;
                            padding: 6px;
                            height: 40px;
                            /* margin-top: auto; */
                            margin-bottom: 0px;
                        }
                    </style>
                        <p class="contact-product">Liên hệ để biết thêm chi tiết</p>
                        @if (session('CustomorUserName'))
                        <button style="margin-left: 16px" class="btn btn-primary px-3" id="contactButton" data-masach={{$products->MaSach}}><i class="fa-solid fa-headset"></i> Liên hệ</button>
                        @endif 
                        @else
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button id="decreaseQuantity" class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input id="quantityInput" name="quantityInput" type="text" class="form-control bg-secondary text-center" value="1">
                                <div class="input-group-btn">
                                    <button id="increaseQuantity" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>                 
                            <button id="addToCartBtn" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                            @if (session('CustomorUserName'))
                            <button style="margin-left: 16px" class="btn btn-primary px-3" id="contactButton" data-masach={{$products->MaSach}}><i class="fa-solid fa-headset"></i> Liên hệ</button>
                            @endif
                        
                    @endif
</div>
            <div id="errorMessage" style="color: red; display: none; margin-top: 10px;">Vượt quá số lượng tồn</div>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Chia sẻ:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Miêu tả</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá ({{$soluongDanhGia}})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Mô tả sản phẩm</h4>
                        <p>{{$products->MoTa}}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Thông tin thêm</h4>
                        <p style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                            {{$products->MoTa}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Mã Hàng : <span> {{$products->MaSach}}</span>                  
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Số Trang : <span> {{$products->SoTrang}} trang</span>                                        
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Trọng lượng : <span> {{$products->TrongLuong}}</span>             
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block; margin: 0px">
                                            Năm xuất bản: <span>{{ \Carbon\Carbon::parse($products->NamXB)->format('Y') }}</span>
                                        </p>
                                    </li>
                                  </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Tác giả : <span> {{$products->MaTG}}</span>
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Nhà xuất bản : <span> {{$productNXB->TenNXB}}</span>
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Nhà cung cấp : <span> Kim Đồng</span>
                                        </p>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <p class="font-weight-semi-bold" style="display: block ;margin: 0px">
                                            Kích Thước Bao Bì : <span> 17.6 x 11.2 x 1.3 cm</span>
                                        </p>
                                    </li>
                                  </ul> 
                            </div>
                        </div>
                    </div>
                      <!-- Đánh giá khách hàng start -------------->
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{$soluongDanhGia}} Đánh giá cho "{{$products->TenSach}}"</h4>
                                @foreach ($danhgiakhs as $danhgia)
                                @php
                                    $khachhang = $khachhangs->where('MaKH', $danhgia->MaKH)->first();
                                @endphp
                                @if ($khachhang)
                                    <div class="media mb-4">
                                        <img src="{{ asset('frontend/Images1/' . $khachhang->AnhDaiDien) }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{ $khachhang->TenKH }}<small> - <i>{{ $danhgia->ThoiGian }}</i></small></h6>
                                            <div class="text-primary mb-2">
                                                @for ($i = 0; $i < $danhgia->Vote; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @for ($i = $danhgia->Vote; $i < 5; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            </div>
                                            <p>{{ $danhgia->DanhGia }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            
                                
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Để lại đánh giá</h4>
                                <small>Địa chỉ email của bạn sẽ không được công bố *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Đánh giá của bạn*:</p>
                                    <div class="text-primary">
                                        <input type="number" id="vote" min="1" max="5" style="width:40px" required>
                                        <i class="fas fa-star"></i> 
                                    </div>
                                </div>
                                <form id="reviewForm" data-masach="{{ $products->MaSach }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="DanhGia">Viết đánh giá *</label>
                                        <textarea id="DanhGia" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <button type="button" class="btn btn-submit btn-primary px-3">Để lại đánh giá</button>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- Đánh giá khách hàng end ---------------->
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bạn có thể thích</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($books as $book)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('frontend/Images1/' . $book->AnhDaiDien) }}" alt=""style="width: 300px;height: 350px;">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$book->TenSach}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$book->GianBan}}</h6>
                                {{-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> --}}
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('product.detail', ['id' => $book->MaSach])}}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                            </a> 
                            <form action="{{ route('cart.add', ['productId' => $book->MaSach]) }}" method="post">
                                @csrf <!-- Add this line to include CSRF token -->
                                <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    @include('backend/dashboard/component/footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/myJS.js')}}"></script>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const decreaseBtn = document.getElementById('decreaseQuantity');
            const increaseBtn = document.getElementById('increaseQuantity');
            const quantityInput = document.getElementById('quantityInput');
            const errorMessageDiv = document.getElementById('errorMessage');
            const stockQuantity = {{ $products->SoLuong }};
            const errorMessage = 'Vượt quá số lượng tồn';

            decreaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (isNaN(currentValue) || currentValue <= 1) {
                    quantityInput.value = 1;
                    errorMessageDiv.style.display = 'none';
                }
            });

            increaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
               
                if (currentValue==0) {
                    quantityInput.value = 1;
                } else if (currentValue > stockQuantity) {
                quantityInput.value = quantityInput.value -1;
                errorMessageDiv.style.display = 'block';
                } 
            });
        });

        document.getElementById('addToCartBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút
            var quantity = document.getElementById('quantityInput').value;
            var url = "{{ route('cart.addDetail', ['productId' => $products->MaSach, 'quantity' => 'quantityValue']) }}";
            url = url.replace('quantityValue', quantity); // Thay thế 'quantityValue' bằng số lượng
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            fetch(url, {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                response.json(); 
                window.location.reload();
            })
            .then(data => {
               
            })
            .catch(error => {
                
            });
        });
        var customerIDName = '{{ session("CustomorUserName") }}';
        $(document).ready(function() {
        $('.btn-submit').on('click', function(event) {
        event.preventDefault();
        if (customerIDName === '') {
            document.getElementById('id01').style.display = 'block';
            console.log(customerIDName);
        } else {
            var ValueForm = document.getElementById('reviewForm');
            var MaSach = ValueForm.getAttribute('data-masach');
            var Vote = $('#vote').val();
            var DanhGia = $('#DanhGia').val();

            $.ajax({
                url: '/product/' + MaSach + '/review',
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    Vote: Vote,
                    DanhGia: DanhGia
                },
                success: function(response) {
                    alert(response.success);
                    location.reload(); // Reload the page to see the new review
                },
                error: function(xhr, status, error) {
                    // Handle validation errors
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMsg = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMsg += errors[key][0] + '\n';
                            }
                        }
                        alert(errorMsg);
                    } else {
                        console.error(xhr.responseText);
                    }
                }
            });
        } 
                });
            });
    </script>
    
</body>

</html>