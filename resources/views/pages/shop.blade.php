
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

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/myStyle.css')}}" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    @include('backend.dashboard.component.header')
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cửa hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="\trang-chu">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cửa hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Lọc theo giá</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price-checkbox" id="price-1" data-price1="0" data-price2="50000">
                            <label class="custom-control-label" for="price-1">0 - 50000vnd</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price-checkbox" id="price-2" data-price1="50000" data-price2="100000">
                            <label class="custom-control-label" for="price-2">50000 - 100000vnd</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price-checkbox" id="price-3" data-price1="100000" data-price2="150000">
                            <label class="custom-control-label" for="price-3">100000 - 150000vnd</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input price-checkbox" id="price-4" data-price1="150000" data-price2="200000">
                            <label class="custom-control-label" for="price-4">150000 - 200000vnd</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input price-checkbox" id="price-5" data-price1="200000">
                            <label class="custom-control-label" for="price-5"> > 200000vnd</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>                        
                    </form>
                    
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                {{-- <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Danh mục chính</h5>
                    <form>
                        @foreach ($nhaxuatbans as $nhaxuatban)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">{{$nhaxuatban->TenNXB}}</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        @endforeach
                    </form>
                </div> --}}
                <!-- Color End -->

                <!-- Size Start -->

                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sắp xếp
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#" data-sort="price-asc">Giá tăng dần</a>
                                            <a class="dropdown-item" href="#" data-sort="price-desc">Giá giảm dần</a>
                                            <a class="dropdown-item" href="#" data-sort="name">Sắp xếp theo tên</a>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                        <div class="col-12 pb-1">
                            <div class="row pb-3" id='show-products'>
                                @foreach ($products as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                    <div class="card product-item border-0 mb-4">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <img class="img-fluid w-100" src="{{ asset('frontend/Images1/'.$item->AnhDaiDien) }} " alt=""style="width: 300px;height: 350px;">
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                            <h6 class="text-truncate mb-3">{{ $item->TenSach }}</h6>
                                            <div class="d-flex justify-content-center">
                                                <h6>{{$item->GiaBan}}</h6></h6>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                            <a href="{{route('product.detail', ['id' => $item->MaSach])}}" class="btn btn-sm text-dark p-0">
                                                <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                                            </a> 
                                            <form action="{{ route('cart.add', ['productId' => $item->MaSach]) }}" method="post">
                                                @csrf <!-- Add this line to include CSRF token -->
                                                <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @endif                   
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor                  
                                @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    @include('backend/dashboard/component/footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các checkbox giá
            const priceCheckboxes = document.querySelectorAll('.price-checkbox');
    
            // Hàm lọc sản phẩm dựa trên các khoảng giá đã chọn
            function filterProducts() {
                // Lấy tất cả các phần tử sản phẩm
                const products = document.querySelectorAll('.product-item');
                
                // Lấy các khoảng giá đã chọn
                const selectedRanges = Array.from(priceCheckboxes).filter(checkbox => checkbox.checked).map(checkbox => {
                    return {
                        min: parseInt(checkbox.getAttribute('data-price1')),
                        max: checkbox.hasAttribute('data-price2') ? parseInt(checkbox.getAttribute('data-price2')) : Infinity
                    };
                });
    
                // Nếu không có checkbox nào được chọn, hiển thị tất cả sản phẩm
                if (selectedRanges.length === 0) {
                    products.forEach(product => {
                        product.parentElement.style.display = 'block';
                    });
                    return;
                }
    
                // Duyệt qua từng sản phẩm để xác định xem nó có nên hiển thị hay không
                products.forEach(product => {
                    const priceElement = product.querySelector('.d-flex h6');
                    const price = parseFloat(priceElement.textContent.replace(/[^\d.-]/g, ''));
                    
                    // Kiểm tra xem giá sản phẩm có nằm trong bất kỳ khoảng giá nào đã chọn hay không
                    const isInRange = selectedRanges.some(range => price >= range.min && price <= range.max);
    
                    // Hiển thị hoặc ẩn sản phẩm dựa trên khoảng giá
                    product.parentElement.style.display = isInRange ? 'block' : 'none';
                });
            }
            //////Chặn load lại web
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
                    const criteria = item.getAttribute('data-sort');
                    sortProducts(criteria); // Gọi hàm sắp xếp với tiêu chí được chọn
                });
            });
            // Hàm sắp xếp sản phẩm
            function sortProducts(criteria) {
                const productsContainer = document.getElementById('show-products'); // Use getElementById to get the container by its ID
                const products = Array.from(document.querySelectorAll('.col-lg-4.col-md-6.col-sm-12.pb-1'));
    
                products.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.d-flex h6').textContent.replace(/[^\d.-]/g, ''));
                    const priceB = parseFloat(b.querySelector('.d-flex h6').textContent.replace(/[^\d.-]/g, ''));
                    const nameA = a.querySelector('h6.text-truncate').textContent.trim().toUpperCase();
                    const nameB = b.querySelector('h6.text-truncate').textContent.trim().toUpperCase();
    
                    switch(criteria) {
                        case 'price-asc':
                            return priceA - priceB;
                        case 'price-desc':
                            return priceB - priceA;
                        case 'name':
                            if (nameA < nameB) return -1;
                            if (nameA > nameB) return 1;
                            return 0;
                    }
                });
    
                // Clear the container and append sorted products
                productsContainer.innerHTML = '';
                products.forEach(product => {
                    productsContainer.appendChild(product);
                });
    
                // Re-apply filtering after sorting
                filterProducts();
            }
    
            // Thêm các sự kiện listener cho các checkbox
            priceCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', filterProducts);
            });
    
            // Event listeners for sorting options
            document.querySelector('.dropdown-item[data-sort="price-asc"]').addEventListener('click', function() {
                sortProducts('price-asc');
            });
            document.querySelector('.dropdown-item[data-sort="price-desc"]').addEventListener('click', function() {
                sortProducts('price-desc');
            });
            document.querySelector('.dropdown-item[data-sort="name"]').addEventListener('click', function() {
                sortProducts('name');
            });
    
            // Trạng thái ban đầu: hiển thị tất cả sản phẩm
            const products = document.querySelectorAll('.product-item');
            products.forEach(product => {
                product.parentElement.style.display = 'block';
            });
        });
    </script>
    
    
    
    
    
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
</body>

</html>