
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nhà xuất bản Kim đồng</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/Images1/titleWebKimDong.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/myStyle.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/styleAccount.css')}}" rel="stylesheet">
</head>
<body>
    @include('backend.dashboard.component.header')
        <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px; ">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang cá nhân</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/trang-chu">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cá nhân</p>
            </div>
        </div>
    </div>
            <!-- Page Header End -->
    <div class="container">
        <h2>Tài khoản người dùng</h2>
        <div class="profile">
            <div class="profile-picture">
                <img src="{{ asset('frontend/Images1/avatar.png')}}" alt="Profile Picture">
            </div>
                @if ($account)
                <div class="profile-details">
                    @php
                        $gioitinh = '';
                        if($account->GioiTinh == 1){
                            $gioitinh = 'Nam';
                        } else {
                            $gioitinh = 'Nữ';
                        }
                    @endphp
                    <p><strong>ID Tài khoản :</strong> <span>{{$account->MaKH}}</span></p>
                    <p><strong>Tên :</strong> <span>{{$account->TenKH}}</span></p>
                    <p><strong>Tài khoản :</strong> <span>{{$account->UserName}}</span></p>
                    <p><strong>Giới tính :</strong> <span>{{$gioitinh}}</span></p>
                    <p><strong>Địa chỉ :</strong> <span>{{$account->DiaChi}}</span></p>
                    <p><strong>Điện thoại :</strong> <span>{{$account->DienThoai}}</span></p>              
                    <a href="/account/update/{{$account->MaKH}}" class="btn btn-primary">Sửa thông tin</a>
                </div>
                @endif
        </div>
    </div>

     <!--  Order tracking  start-->
     <div class="container-order">
        <div class="row">
            <div class="col-12 col-md-12 hh-grayBox pt45 pb20">
                <div class="row justify-content-between">
                    <div class="order-tracking" id="ordertracking1">
                        @if ($hoadonbans1)
                            @php
                                $count1=count($hoadonbans1);
                            @endphp
                        @endif
                        <span class="custom-span ">{{$count1}}</span>
                        <span class="is-complete"><i class="fa-solid fa-box-open icon"></i></span>
                    </div>
                        @if ($hoadonbans2)
                            @php
                                $count2=count($hoadonbans2);
                            @endphp
                        @endif
                    <div class="order-tracking" id="ordertracking2">
                        <span class="custom-span ">{{$count2}}</span>
                        <span class="is-complete"><i class="fa-solid fa-truck icon"></i></span>
                    </div>
                    <div class="order-tracking" id="ordertracking3">
                        <span class="is-complete"><i class="fa-regular fa-star icon"></i></span>
                    </div>
                </div>
            </div>
            <div class="order-view1" style="width: 80%; margin: 0 auto;">
                <h2>Đơn hàng của tôi</h2>
                <div class="table-order">
                    <div class="table-order-row table-order-header">
                        <div class="table-order-cell">Mã đơn hàng</div>
                        <div class="table-order-cell">Ngày mua</div>
                        <div class="table-order-cell">Người nhận</div>
                        <div class="table-order-cell">Tổng Tiền</div>
                        <div class="table-order-cell">Trạng thái</div>
                        <div class="table-order-cell"></div>
                    </div>
                    @if ($hoadonbans1)
                        @foreach ($hoadonbans1 as $hoadonban)
                        @php
                        $total = 0;
                    @endphp
                            <div class="table-order-row">
                                <div class="table-order-cell">{{ $hoadonban->SoHDB }}</div>
                                <div class="table-order-cell">{{ $hoadonban->NgayBan }}</div>
                                <div class="table-order-cell">{{ $khachhang->TenKH }}</div>
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                        @php
                                            $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                        @endphp

                                @endforeach
                                <div class="table-order-cell">{{ $total }}</div>
                                <div class="table-order-cell">
                                @php
                                    $trangthai = '';
                                    if($hoadonban->TrangThai==1){
                                        $trangthai = 'Đang xử lý';
                                    }                                   
                                    else if($hoadonban->TrangThai==2){
                                       $trangthai = 'Đang giao hàng';
                                    }                                   
                                    else if($hoadonban->TrangThai==3){
                                        $trangthai = 'Giao hàng thành công';
                                    }
                                @endphp
                                    {{ $trangthai  }}
                                </div>
                                <div class="table-order-cell"><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}" style="text-decoration: none;">Xem chi tiết</a></div>
                            </div>
                            <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                <ul style="display: inline;padding: 0px">
                                    @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)
                                        
                                        <li style="display: inline-block; height: 55px; width: 30%;">
                                            <div class="miniview-body">
                                                <div class="miniview-book">
                                                    <div class="miniview-book__img">
                                                        <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style="height: 100%; width: 100%;">
                                                    </div>
                                                    <div class="miniview-book__body">
                                                        <div class="view-book-info">
                                                            <p style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                            @php
                                                                $giaban=$chitietHDB->SoLuongBan*$chitietHDB->GiaBan
                                                            @endphp
                                                            <p>Số lượng: {{ $chitietHDB->SoLuongBan }}|Tổng :{{$giaban}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </li>
                                       
                                    @endforeach
                                </ul>
                                
                            </div>
                        @endforeach
                    @endif
                </div>
                              
            </div>

            <div class="order-view2" style="width: 80%; margin: 0 auto;">
                <h2>Đơn hàng của tôi</h2>
                <div class="table-order">
                    <div class="table-order-row table-order-header">
                        <div class="table-order-cell">Mã đơn hàng</div>
                        <div class="table-order-cell">Ngày mua</div>
                        <div class="table-order-cell">Người nhận</div>
                        <div class="table-order-cell">Tổng Tiền</div>
                        <div class="table-order-cell">Trạng thái</div>
                        <div class="table-order-cell"></div>
                    </div>
                    @if ($hoadonbans1)
                        @foreach ($hoadonbans2 as $hoadonban)
                        @php
                        $total = 0;
                    @endphp
                            <div class="table-order-row">
                                <div class="table-order-cell">{{ $hoadonban->SoHDB }}</div>
                                <div class="table-order-cell">{{ $hoadonban->NgayBan }}</div>
                                <div class="table-order-cell">{{ $khachhang->TenKH }}</div>
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)

                                        @php
                                            $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                        @endphp

                                @endforeach
                                <div class="table-order-cell">{{ $total }}</div>
                                <div class="table-order-cell">
                                @php
                                    $trangthai = '';
                                    if($hoadonban->TrangThai==1){
                                        $trangthai = 'Đang xử lý';
                                    }                                   
                                    else if($hoadonban->TrangThai==2){
                                       $trangthai = 'Đang giao hàng';
                                    }                                   
                                    else if($hoadonban->TrangThai==3){
                                        $trangthai = 'Giao hàng thành công';
                                    }
                                @endphp
                                    {{ $trangthai  }}
                                </div>
                                <div class="table-order-cell"><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}" style="text-decoration: none;">Xem chi tiết</a></div>
                            </div>
                            <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                <ul style="display: inline;padding: 0px">
                                    @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)
                                        
                                        <li style="display: inline-block; height: 55px; width: 30%;">
                                            <div class="miniview-body">
                                                <div class="miniview-book">
                                                    <div class="miniview-book__img">
                                                        <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style="height: 100%; width: 100%;">
                                                    </div>
                                                    <div class="miniview-book__body">
                                                        <div class="view-book-info">
                                                            <p style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                            @php
                                                                $giaban=$chitietHDB->SoLuongBan*$chitietHDB->GiaBan
                                                            @endphp
                                                            <p>Số lượng: {{ $chitietHDB->SoLuongBan }}|Tổng :{{$giaban}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </li>
                                       
                                    @endforeach
                                </ul>
                                
                            </div>
                        @endforeach
                    @endif
                </div>
                
                
            </div>
            <div class="order-view3" style="width: 80%; margin: 0 auto;">
                <h2>Đơn hàng của tôi</h2>
                <div class="table-order">
                    <div class="table-order-row table-order-header">
                        <div class="table-order-cell">Mã đơn hàng</div>
                        <div class="table-order-cell">Ngày mua</div>
                        <div class="table-order-cell">Người nhận</div>
                        <div class="table-order-cell">Tổng Tiền</div>
                        <div class="table-order-cell">Trạng thái</div>
                        <div class="table-order-cell"></div>
                    </div>
                    @if ($hoadonbans1)
                        @foreach ($hoadonbans3 as $hoadonban)
                        @php
                        $total = 0;
                    @endphp
                            <div class="table-order-row">
                                <div class="table-order-cell">{{ $hoadonban->SoHDB }}</div>
                                <div class="table-order-cell">{{ $hoadonban->NgayBan }}</div>
                                <div class="table-order-cell">{{ $khachhang->TenKH }}</div>
                                @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)
                                    
                                        @php
                                            $total += $chitietHDB->GiaBan * $chitietHDB->SoLuongBan;
                                            $anh=$chitietHDB->AnhDaiDien
                                        @endphp
                                  
                                @endforeach
                                <div class="table-order-cell">{{ $total }}</div>
                                <div class="table-order-cell">
                                @php
                                    $trangthai = '';
                                    if($hoadonban->TrangThai==1){
                                        $trangthai = 'Đang xử lý';
                                    }                                   
                                    else if($hoadonban->TrangThai==2){
                                       $trangthai = 'Đang giao hàng';
                                    }                                   
                                    else if($hoadonban->TrangThai==3){
                                        $trangthai = 'Giao hàng thành công';
                                    }
                                @endphp
                                    {{ $trangthai  }}
                                </div>
                                <div class="table-order-cell"><a href="#" class="toggle-detail" data-id="{{ $hoadonban->SoHDB }}" style="text-decoration: none;">Xem chi tiết</a></div>
                            </div>
                            <div class="listViewDetail" id="detail-{{ $hoadonban->SoHDB }}">
                                <ul style="display: inline;padding: 0px">
                                    @foreach ($chitietHDBs->where('SoHDB', $hoadonban->SoHDB) as $chitietHDB)
                                        
                                        <li style="display: inline-block; height: 55px; width: 30%;">
                                            <div class="miniview-body">
                                                <div class="miniview-book">
                                                    <div class="miniview-book__img">
                                                        <img src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style="height: 100%; width: 100%;">
                                                    </div>
                                                    <div class="miniview-book__body">
                                                        <div class="view-book-info">
                                                            <p style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $chitietHDB->TenSach }}</p>
                                                            @php
                                                                $giaban = $chitietHDB->SoLuongBan * $chitietHDB->GiaBan;
                                                              
                                                            @endphp
                                                            <p>Tổng: {{$giaban}}  
                                                                @if ($chitietHDB->MaSach!=1)
                                                                <button type="button" id="btn-openform{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}" class="btn-openform btn-submit btn-primary px-3" style="width: 90px; font-size: 10px;" data-masach="{{ $chitietHDB->MaSach }}" data-sohdb="{{ $chitietHDB->SoHDB }}">Đánh giá</button>
                                                            </p>
                                                                @endif
                                                               
                                                            <form class="formreview" id="reviewForm{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}" data-test="{{ $chitietHDB->AnhDaiDien }}" data-masach="{{ $chitietHDB->MaSach }}" data-sohdb="{{ $chitietHDB->SoHDB }}">
                                                                @csrf
                                                                <div class="form-group2"> 
                                                                    <img  data-masach="{{ $chitietHDB->MaSach }}" src="{{ asset('frontend/Images1/'.$chitietHDB->AnhDaiDien) }}" alt="" style="display: block; margin: auto; max-width: 50%; height: 50%;">
                                                                    <div class="form-group-content">    
                                                                        <div class="text-primary">
                                                                            <label for="DanhGia">Đánh giá*</label>
                                                                            <input type="number" id="vote{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}" min="1" max="5" style="width:40px" required>
                                                                            <i class="fas fa-star"></i> 
                                                                        </div>
                                                                        <label for="DanhGia{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}">Đánh giá*</label>
                                                                        <textarea id="DanhGia{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}" cols="30" rows="5" class="form-control" required style="border: 1px solid black"></textarea>
                                                                        
                                                                    </div>
                                                                    <button type="button" review-id='{{ $chitietHDB->SoHDB }}{{ $chitietHDB->MaSach }}' review-masach='{{ $chitietHDB->MaSach }}' class="btn-final btn-submit btn-primary px-3">Để lại đánh giá</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </li>
                                       
                                    @endforeach
                                </ul>
                                
                            </div>
                        @endforeach
                    @endif
                </div>
                
                
            </div>
    </div>
    
    
    
    
      <!--  Order tracking  end-->
    
    @include('backend/dashboard/component/footer')

</body>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const orderTracking1 = document.getElementById('ordertracking1');
        const orderTracking2 = document.getElementById('ordertracking2');
        const orderTracking3 = document.getElementById('ordertracking3');

        const orderView1 = document.querySelector('.order-view1');
        const orderView2 = document.querySelector('.order-view2');
        const orderView3 = document.querySelector('.order-view3');

        const icons = document.querySelectorAll('.icon');

        function resetIconColors() {
            icons.forEach(icon => icon.style.color = '');
        }

        orderTracking1.addEventListener('click', function() {
            orderView1.style.display = 'block';
            orderView2.style.display = 'none';
            orderView3.style.display = 'none';

            resetIconColors();
            this.querySelector('.icon').style.color = 'rgb(39,170,128)';
        });

        orderTracking2.addEventListener('click', function() {
            orderView1.style.display = 'none';
            orderView2.style.display = 'block';
            orderView3.style.display = 'none';

            resetIconColors();
            this.querySelector('.icon').style.color = 'rgb(39,170,128)';
        });

        orderTracking3.addEventListener('click', function() {
            orderView1.style.display = 'none';
            orderView2.style.display = 'none';
            orderView3.style.display = 'block';

            resetIconColors();
            this.querySelector('.icon').style.color = 'rgb(39,170,128)';
        });

        // Initially hide all views
        orderView1.style.display = 'none';
        orderView2.style.display = 'none';
        orderView3.style.display = 'none';

        const toggleLinks = document.querySelectorAll('.toggle-detail');
        toggleLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const detailId = this.getAttribute('data-id');
                const detailDiv = document.getElementById('detail-' + detailId);
                if (detailDiv) {
                    detailDiv.style.display = detailDiv.style.display === 'none' || detailDiv.style.display === '' ? 'block' : 'none';
                }
            });
        });
        
// Đảm bảo rằng biến btnOpenForms đã được khai báo và gán giá trị trước khi sử dụng
var btnOpenForms = document.querySelectorAll(".btn-openform");

btnOpenForms.forEach(function(btn) {
    btn.addEventListener("click", function(event) {
        event.stopPropagation(); 

        var masach = this.getAttribute("data-masach");
        var sohdb = this.getAttribute("data-sohdb");
        var formId = "#reviewForm" + sohdb + masach;
        var reviewForm = document.querySelector(formId);
        if (reviewForm) {
            reviewForm.style.display = "block";
            reviewForm.setAttribute("data-masach", masach);
            reviewForm.setAttribute("data-sohdb", sohdb);
        }
    });
});

// Xử lý khi click bên ngoài form để đóng form
window.addEventListener("click", function(event) {
    btnOpenForms.forEach(function(btn) {
        var sohdb = btn.getAttribute("data-sohdb");

        var masach = btn.getAttribute("data-masach");
        var formId = "#reviewForm" + sohdb + masach;
        var reviewForm = document.querySelector(formId);
        if (reviewForm && event.target == reviewForm) {
            reviewForm.style.display = "none";
        }
    });
});

    var closeBtns = document.querySelectorAll("[id^='reviewForm'] .close");
    closeBtns.forEach(function(closeBtn) {
        closeBtn.addEventListener("click", function() {
            var reviewForm = this.closest("form");
            if (reviewForm) {
                reviewForm.style.display = "none";
            }
        });
    });
    var buttons = document.querySelectorAll(".btn-final");
buttons.forEach(function(button) {
    button.addEventListener("click", function(event) {
        event.preventDefault();
        var reviewId = this.getAttribute("review-id");
        var MaSach = this.getAttribute("review-masach");
        var Vote = document.getElementById("vote" + reviewId).value;
        var DanhGia = document.getElementById("DanhGia" + reviewId).value;
        console.log("Vote:", Vote);
        console.log("Đánh giá:", DanhGia);
        console.log("Mã sách:", MaSach);
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
    });
});
});


</script>

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