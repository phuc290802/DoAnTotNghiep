<!-- Topbar Start -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('frontend/css/messageStyle.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/notificationBox.css')}}" rel="stylesheet">
<style>
        .message-content.outgoing {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 10px;
            margin-right: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 70%;
        }

        /* Product message container */
        .product-message {
            display: flex;
            align-items: center;
        }

        /* Product image container */
        .product-image {
            overflow: hidden;
            flex-shrink: 0;
            margin-right: 10px;
        }

        /* Product image styling */
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Product info container */
        .product-info {
            display: flex;
            flex-direction: column;
            text-align: left; /* Ensures text is aligned to the left */
        }

        /* Product ID styling */
        .product-info .product-id {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin: 0; /* Reset margin to ensure proper alignment */
        }

        /* Product name styling */
        .product-info .product-name {
            font-size: 12px;
            color: #777;
            margin: 5px 0 0 0; /* Reset margin to ensure proper alignment */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Maximum number of lines */
            -webkit-box-orient: vertical;
            line-height: 1.2em; /* Adjust as needed */
            max-height: 2.4em; /* 2 * line-height */
        }

        /* Product price styling */
        .product-info .product-price {
            font-size: 12px;
            color: #777;
            margin: 5px 0 0 0; /* Reset margin to ensure proper alignment */
        }

        /* Avatar container */
        .avatar {
            overflow: hidden;
            flex-shrink: 0;
        }

        /* Avatar image styling */
        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

       .message-options {
        position: relative;
        display: inline-block;
    }

    .options-trigger {
        margin: 10px;
        cursor: pointer;
        padding: 5px;
        background-color: #ccc;
        border-radius: 0%;
        display: block;
        background: white;
    }

    .options-menu {
        position: absolute;
        top: 40px;
        width: 68px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 10;
        display: none;
    }

    .options-menu button {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        background: none;
        cursor: pointer;
        font-size: 13px;
    }

    .options-menu button:hover {
        background-color: #f0f0f0;
    }

        .emoji:hover {
            background-color: rgb(220, 220, 220);
        }
        .set-emoji {
        display: block;
        margin-top: 5px; 
        width: 25px
    }



</style>

<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Liên hệ</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Hỗ trợ</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
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
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{URL::to('/trang-chu')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Kim</span>Đồng</h1>
            </a>
        </div>
       <!-- search start -->
       <div class="col-lg-6 col-6 text-left">
        <form action="{{ route('product.search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm sản phẩm...." name="keyword" >
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul id="searchResult" class="list-group mt-2"></ul> <!-- Suggestions will be shown here -->
    </div>
    
       <!-- end search -->
        
        
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>

            <a href="#" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                @php
                $total = 0;
                $count = 0; 
                if ($cart != null && is_array($cart)) {
                    $count = count($cart);
                }
                @endphp
                <span class="badge">{{ $count }}</span>
            
                <div class="header__cart-list header__cart-list--no-cart">
                    <h5>Giỏ hàng của tôi ({{ $count }} sản phẩm)<span class="btnCloseQVCart"><i class="fa fa-times" aria-hidden="true"></i></span></h5>
                    @if ($cart == null || count($cart) == 0)
                        <img src="{{ asset('frontend/Images1/emptyCart.png') }}" alt="" class="header__cart-no-cart-img">
                    @else
                        <ul class="minicart-ul">
                            @foreach ($cart as $item)
                                <li class="cart-item" id="{{ $item['MaSach'] }}">
                                    <div class="minicart-body">
                                        <div class="minicart-item">
                                            <div class="minicart-item__img">
                                                <img src="{{ asset('frontend/Images1/'.$item['AnhDaiDien']) }}" alt="" style="height: 100px">
                                            </div>
                                            <div class="minicart-item__body">
                                                <div class="cart-item-info">
                                                    <p>{{ $item['TenSach'] }}</p>
                                                </div>
                                                <div class="cart-item-price-quantity">
                                                    <span>Số lượng: {{ $item['quantity'] }}<span class="minicart-delete"><i class="fa fa-times" aria-hidden="true"></i></span></span><br> 
                                                    <span>Giá/sp: {{ $item['GiaBan'] }}đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @php
                                $total += $item['quantity'] * $item['GiaBan'];
                                @endphp
                            @endforeach
                        </ul>
                        <div class="minicart-checkout">
                            <span class="minicart-total">Tạm tính: <span style="color: rgb(237, 62, 24)">{{ number_format($total) }}đ</span></span>
                            <br>
                            <button type="button" class="btn btn-success" style="background-color: rgb(209, 156, 151); border: none; border-radius: 3px">Xem giỏ hàng</button>
                            <button type="button" class="btn btn-danger view-checkout" style="color: rgb(209, 156, 151); border: 1px solid rgb(209, 156, 151); border-radius: 3px; background-color: white">Thanh toán</button>
                        </div>
                    @endif
                </div>
            </a>
            
            <!-- Mini Cart end -->
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Thể loại</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Nhà xuất bản <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($nhaxuatbans as $nhaxuatban)
                                <a href="{{ route('product.nhaxuatban', ['id' => $nhaxuatban->MaNXB]) }}" class="nav-item nav-link">{{ $nhaxuatban->TenNXB }}</a>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($categorys as $category)
                        @if($category->theloainho->isNotEmpty())
                            <div class="nav-item dropdown">
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    @foreach ($category->theloainho as $theloainho)
                                        <a href="{{ route('product.theloainho', ['id' => $theloainho->MaTLCon]) }}" class="nav-item nav-link">{{ $theloainho->TenTL }}</a>
                                    @endforeach
                                </div>
                                <a href="{{ route('product.category', ['id' => $category->MaTL]) }}" class="nav-link" data-toggle="dropdown">{{ $category->TenTL }} <i class="fa fa-angle-down float-right mt-1"></i></a>
                            </div>
                        @else
                            <a href="{{ route('product.category', ['id' => $category->MaTL]) }}" class="nav-item nav-link">{{ $category->TenTL }}</a>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>
        
        
        
        
        {{-- end category_list end --}}


        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Kim</span>Đồng</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{URL::to('/trang-chu')}}" class="nav-item nav-link active">Trang chủ</a>
                        <a href="shop.html" class="nav-item nav-link"></a>
                        <a href="/aboutus" class="nav-item nav-link">Giới thiệu</a>
                        <a href="/blog" class="nav-item nav-link">Tin tức</a>

                 {{------------- form login start -------------}}
                    <div class="header-login">
                        @php
                            $CustomorUserName = session('CustomorUserName');
                            $CustomorPassword = session('CustomorPassword');
                        @endphp
                            @if ($CustomorUserName == null || $CustomorPassword == null) 

                            <a href="#" class="nav-item nav-link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</a>                         
                             
                            @else 
                            <a href="{{ url('/account') }}" class="nav-item nav-link" style="width:auto;">
                                {{ $CustomorUserName ? $CustomorUserName : 'Đăng nhập' }}
                            </a>
                            
                            
                            @endif
                       
                
                        <div id="id01" class="modal">              
                            <form class="modal-content animate" action="{{URL::to('/login')}}" method="post">
                                @csrf
                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <img src="{{asset('frontend/Images1/imageLogin')}}.png" alt="Avatar" class="avatar">
                                </div>
                            
                                <div class="container">
                                    <label for="uname"><b>Tài khoản</b></label>
                                    <input type="text" placeholder="Tài khoản" name="UserName" required>
                            
                                    <label for="psw"><b>Mật khẩu</b></label>
                                    <input type="password" placeholder="Mật khẩu" name="Password" required>
                            
                                    <button type="submit">Đăng nhập</button>
                                    <label>
                                        <input type="checkbox" checked="checked" name="remember"> Nhớ mật khẩu
                                    </label>
                                </div>
                            
                                <div class="container" style="background-color:#f1f1f1">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy</button>
                                    <span class="psw"><a href="" class="new-account">Tạo tài khoản mới</a>Quên <a href="#">Mật khẩu?</a></span>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                    
                {{------------- form login end -------------}}

                {{------------- form register start -------------}}
                        <div class="header-register">
                            @php
                            $CustomorUserName = session('CustomorUserName');
                            $CustomorPassword = session('CustomorPassword');
                            @endphp
                            @if ($CustomorUserName == null || $CustomorPassword == null) 
                            
                            <!-- The login link should be outside of the PHP block -->
                            <a href="#" class="nav-item nav-link" onclick="document.getElementById('registerModal').style.display='block'" style="width:auto;">Đăng ký</a>          
                             @else 
                            <a href="#" class="nav-item nav-link" style="width:auto;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                            <form id="logout-form" method="POST" action="{{ url('/logout') }}" style="display: none;">
                                @csrf
                            </form>
                            @endif
                            
                        
                            <div id="registerModal" class="modal">
                                <form class="modal-content animate" action="{{URL::to('/register')}}" method="post">
                                    @csrf
                                    <div class="imgcontainer">
                                        <span onclick="document.getElementById('registerModal').style.display='none'" class="close" title="Close Modal">&times;</span>
                                        <img src="{{ asset('frontend/Images1/imageRegister') }}.png" alt="Avatar" class="avatar">
                                    </div>

                                    <div class="container">
                                        <label for="name"><b>Tên</b></label> <label for="Username"><b>Tài khoản</b></label>
                                        <input type="text" placeholder="Tên" name="TenKH" required>
                                        <input type="text" placeholder="Tài khoản" name="UserName" required>

                                        <label for="sodienthaoi"><b>Số điện thoại</b></label><label for="GioiTinh"><b>Giới tính</b></label>
                                        <input type="tel" placeholder="Số điện thoại" name="DienThoai" required>
                                        <span for="male" class="span-male"><input type="radio" name="GioiTinh" value="1"> Nam</span>                                
                                        <span for="female" class="span-female"><input type="radio" name="GioiTinh" value="2">Nữ</span> 
                                        <label for="password" style="width: 100%"><b>Mật khẩu</b></label>
                                        <input type="password" placeholder="Mật khẩu" name="Password" required style="width: 100%">
                                        <label for="location"><b>Địa chỉ</b></label>
                                        <input type="location" placeholder="Địa chỉ" name="DiaChi" required style="width: 100%">
                                        <button type="submit">Đăng kí</button>
                                    </div>

                                    <div class="container" style="background-color:#f1f1f1">
                                        <button type="button" onclick="document.getElementById('registerModal').style.display='none'" class="cancelbtn">Hủy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



        
                        <div class="notifications"></div>

                            @if (session('error') || session('successlogin'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const notifications = document.querySelector('.notifications');
                                
                                        function createToast(type, icon, title, text) {
                                            const newToast = document.createElement('div');
                                            newToast.classList.add('toast', type);
                                            newToast.innerHTML = `
                                                <i class="${icon}"></i>
                                                <div class="content">
                                                    <div class="title">${title}</div>
                                                    <span>${text}</span>
                                                </div>
                                                <i class="fa-solid fa-xmark" onclick="this.parentElement.remove()"></i>
                                            `;
                                            notifications.appendChild(newToast);
                                            setTimeout(() => newToast.remove(), 5000); // Remove the toast after 5 seconds
                                        }
                                
                                        @if (session('error'))
                                            createToast('error', 'fa-solid fa-circle-exclamation', 'Thông báo', '{{ session('error') }}');
                                        @endif
                                
                                        @if (session('successlogin'))
                                            createToast('success', 'fa-solid fa-circle-check', 'Thành công', '{{ session('successlogin') }}');
                                        @endif
                                    });
                                </script>
                            @endif

                        
            

                    
                      
                {{------------- form register end -------------}}


                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{URL::to('/cart')}}" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div>--}}
                    </div> 

                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">      
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('frontend/Images1/banner1')}}.png" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 10% cho đơn hàng đầu tiên</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Sách Văn Học</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Mua hàng ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('frontend/Images1/banner5')}}.png" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 10% cho đơn hàng đầu tiên</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Truyện Tranh Manga</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Mua hàng ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('frontend/Images1/banner2')}}.png" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm 10% cho đơn hàng đầu tiên</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Truyện Tranh Manga</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Mua hàng ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<div class="container-fluid pt-5" id="container-fluid-support">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sách mới nhất</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí giao hàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Đổi trả trong 14 ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>

@if (session('CustomorUserName'))
    {{--//////////////////////////////////////// message start ////////////////////////////////////////--}}
<div class="container-message" id="chatBox">
    <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="Message Icon" id="message-icon">
    <div class="chat-content">
        <div class="chat-box" id="messageContainer">
            <!-- Message Header -->
            <div class="message-header">
                <div class="avatar">
                    <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="Avatar">
                </div>
                <div class="user-info">
                    <p>Kim Đồng</p>
                </div>
                <button class="close-btn" id="closeChatBox"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
            <!-- Body Message -->
            <div class="body-message" id="bodyMessage">

            </div>
            <!-- Input Field and Send Button -->
            <div class="input-field">
                <input type="text" placeholder="Tin nhắn ..." id="messageInput">
                <button id="sendButton">Send</button>
            </div>
        </div>
    </div>
</div>
{{--//////////////////////////////////////// message end ////////////////////////////////////////--}}
@endif

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    $(document).ready(function() {
        

        $(document).on('click', '.emoji', function() {
            const emoji = $(this);
            const messageId = emoji.closest('.incoming-message').data('message-id');
            const emojiId = emoji.data('emoji');

            if (emoji.hasClass('active')) {
                setEmoji(messageId, 0); // Thay đổi giá trị emojiId thành 0
                emoji.removeClass('active').css('background-color', '');
            } else {
                $(`.incoming-message[data-message-id="${messageId}"] .emoji`).removeClass('active').css('background-color', '');
                emoji.addClass('active').css('background-color', '#dcdcdc');
                setEmoji(messageId, emojiId);
                // Tự động đóng options-menu khi chọn emoji
                $('.options-menu').hide();
            }
        });

        function setEmoji(messageId, emojiId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/message/emoji/' + messageId,
                method: 'PUT',
                data: { emoji: emojiId }, // Chỉ truyền giá trị emoji
                success: function(response) {
                    // Cập nhật emoji thành công
                },
                error: function(xhr, status, error) {
                    console.error('Failed to update emoji:', error);
                }
            });
        }

    //  sự kiện click cho .options-trigger
    $(document).on('click', '.options-trigger', function() {
        const menu = $(this).siblings('.options-menu');
        // Ẩn tất cả các options-menu khác trước khi hiển thị cái này
        $('.options-menu').not(menu).hide();
        menu.toggle();
    });

    //  sự kiện click cho .delete-message

    const chatBox = $("#chatBox");
    const closeChatBtn = $("#closeChatBox");
    const closeIcon = $("#message-icon");
    const currentMaKH = "{{ session('CustomorID') }}"; 
    Pusher.logToConsole = true;

    //id pusher
    var pusher = new Pusher('44a6bb754707f0034c10', {
        cluster: 'ap1',
        forceTLS: true
    });

    //pusher cho giao diện
    var channel = pusher.subscribe('chat');
    channel.bind('sent', function(data) {
        if (data.message) {
            try {
                var messageContent = JSON.parse(data.message.message);
            } catch (e) {
                var messageContent = data.message.message;
            }
            if (data.message.MaKH !== currentMaKH) {
              return;
            }
            if (Array.isArray(messageContent)) {
                renderProductMessage(messageContent,data.message.id);
            } else {
                if (data.message.check === 2) {
                    var incomingMessage = renderIncomingMessage(messageContent, data.message.thoigiannhan,data.message.id,data.message.emoji);
                    $(".body-message").append(incomingMessage);
                } else if (data.message.check === 1) {
                    var outgoingMessage = renderOutgoingMessage(messageContent, data.message.thoigiannhan,data.message.id,data.message.emoji);
                    $(".body-message").append(outgoingMessage);
                }
            }
        }
        scrollToBottom();
    });

    // Ẩn giao diện
    closeIcon.on("click", function(event) {
        const chatContent = chatBox.find(".chat-content");
        if (chatContent.css("display") === "none" || !chatContent.css("display")) {
            chatContent.css("display", "block");
            closeIcon.css("display", "none");
            scrollToBottom();
        } else {
            chatContent.css("display", "none");
        }
        event.stopPropagation();
    });

    // Nút đóng chat
    closeChatBtn.on("click", function(event) {
        const chatContent = chatBox.find(".chat-content");
        chatContent.css("display", "none");
        closeIcon.css("display", "block");
        event.stopPropagation(); 
    });

    // Scroll cuối tin nhắn
    function scrollToBottom() {
        var messageContainer = document.getElementById('bodyMessage');
        messageContainer.scrollTop = messageContainer.scrollHeight;
    }
    // set emoji
    function getIcon(emojiId) {
        let icon = '';
        if (emojiId) {
            if (emojiId == '1') {
                icon = '❤️';
            } else if (emojiId == '2') {
                icon = '😄';
            } else if (emojiId == '3') {
                icon = '👍';
            } else if (emojiId == '4') {
                icon = '🥰';
            } else if (emojiId == '5') {
                icon = '🤔';
            } else if (emojiId == '6') {
                icon = '😡';
            }
        }
        return icon;
    }
    // Render tin nhắn nhận
    function renderIncomingMessage(message, time, id, emojiId) {
            let icon = getIcon(emojiId);
            const existingMessage = $(`.incoming-message[data-message-id="${id}"]`);

            // If the message is deleted
            if (message === 'Tin nhắn đã bị thu hồi') {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.message-content').html(`
                        <p>${message}</p>
                        <span class="time">${time}</span>
                    `);
                    existingMessage.find('.message-options').css('display', 'none');
                    existingMessage.find('.avatar img').css('display', 'none');
                    existingMessage.find('.set-emoji').css('display', 'none');
                } else {
                    // Append new deleted message content
                    return `
                        <div class="incoming-message" data-message-id="${id}">
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="Sender Avatar">
                            </div>
                            <div class="message-content incoming">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                            </div>
                        </div>
                    `;
                }
            } else {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.set-emoji').html(icon);
                    existingMessage.find('.emoji').removeClass('active').css('background-color', ''); // Reset previous active emoji
                    existingMessage.find(`.emoji[data-emoji="${emojiId}"]`).addClass('active').css('background-color', '#dcdcdc');
                } else {
                    // Remove any existing message with the same ID before appending
                    $(`.incoming-message[data-message-id="${id}"]`).remove();

                    let emojis = '';
                    for (let i = 1; i <= 6; i++) {
                        let activeClass = emojiId === i ? 'class="emoji active"' : 'class="emoji"';
                        let bgColor = emojiId === i ? 'style="cursor: pointer; background-color: #dcdcdc;"' : 'style="cursor: pointer;"';
                        emojis += `<span ${activeClass} data-emoji="${i}" ${bgColor}>${getIcon(i)}</span>`;
                    }
                    // Append new message content
                    return `
                        <div class="incoming-message" data-message-id="${id}">
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="Sender Avatar">
                            </div>
                            <div class="message-content">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                                <span class="set-emoji">${icon}</span>
                            </div>
                            
                            <div class="message-options">
                                <span class="options-trigger">⋮</span>
                                <div class="options-menu" style="display: none;">
                                    <div class="emoji-picker">
                                        ${emojis}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
        }


    // Render tin nhắn gửi
    function renderOutgoingMessage(message, time, id, emojiId) {
            let icon = getIcon(emojiId);
            const existingMessage = $(`.outgoing-message[data-message-id="${id}"]`);

            // If the message is deleted
            if (message === 'Tin nhắn đã bị thu hồi') {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.message-content').html(`
                        <p>${message}</p>
                        <span class="time">${time}</span>
                    `);
                    existingMessage.find('.message-options').css('display', 'none');
                    existingMessage.find('.avatar img').css('display', 'none');
                    existingMessage.find('.set-emoji').css('display', 'none');
                } else {
                    // Append new deleted message content
                    return `
                        <div class="outgoing-message" data-message-id="${id}">
                            <div class="message-content outgoing">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                            </div>
                        </div>
                    `;
                }
            } else {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.set-emoji').html(icon);
                    existingMessage.find('.emoji').removeClass('active').css('background-color', ''); // Reset previous active emoji
                    existingMessage.find(`.emoji[data-emoji="${emojiId}"]`).addClass('active').css('background-color', '#dcdcdc');
                } else {
                    // Remove any existing message with the same ID before appending
                    $(`.outgoing-message[data-message-id="${id}"]`).remove();

                    // Append new message content
                    return `
                        <div class="outgoing-message" data-message-id=${id}>
                            <div class="message-options">
                                <span class="options-trigger">⋮</span>
                                <div class="options-menu" style="display: none;width: 40px;">
                                    <button class="delete-message" data-message-id="${id}">Gỡ</button>
                                </div>
                            </div>
                            <div class="message-content outgoing">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                                <span class="set-emoji">${icon}</span>
                            </div>
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/avatar.png') }}" alt="User Avatar">
                            </div>
                        </div>
                    `;
                }
            }
        }

        
        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.slice(0, maxLength) + '...';
            }
            return text;
        }

        // Render thông tin sản phẩm
        function renderProductMessage(productMess) {
            const truncatedName = truncateText(productMess[2], 23);
            const productHtml = `
                <div class="incoming-message">
                    <div class="message-content incoming" style="background-color: rgb(237, 241, 255); border-radius: 0%;">
                        <div class="product-message"> 
                            <div class="product-image">
                                <img src="{{ asset('frontend/Images1/${productMess[1]}') }}" alt="Product Image" style="border-radius: 0%;width:56px">
                            </div>
                            <div class="product-info">
                                <p class="product-id">Mã: ${productMess[0]}</p>
                                <p class="product-name">Tên: ${truncatedName}</p>
                                <p class="product-name">Giá : ${productMess[3]}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            if (productMess[2] === 'Tin nhắn đã bị thu hồi') {
                return `
                <div class="outgoing-message" data-message-id="${id}">
                    <div class="message-content outgoing">
                        <p>${productMess[2]}</p>
                        <span class="time">${time}</span>
                    </div>
                </div>
                `;
            }

            // Thêm HTML vào container của tin nhắn
            var messageContainer = document.getElementById('bodyMessage');
            $(messageContainer).append(productHtml);
            scrollToBottom(); // Cuộn xuống dưới cùng sau khi thêm tin nhắn mới
        }
      // Render messages


    ///Giới hạn tên của sản phẩm
    function truncateText(text, maxLength) {
        if (text.length > maxLength) {
            return text.slice(0, maxLength) + '...';
        }
        return text;
    }

    // Render thông tin sản phẩm
    function renderProductMessage(productMess, id) {
            const truncatedName = truncateText(productMess[2], 23);
            const productHtml = `
                <div class="outgoing-message" data-message-id="${id}">
                    <div class="message-options">
                        <span class="options-trigger">⋮</span>
                        <div class="options-menu" style="display: none;width: 40px;">
                            <button class="delete-message" data-message-id="${id}">Gỡ</button>
                        </div>
                    </div>
                    <div class="message-content outgoing" style="background-color: rgb(237, 241, 255); border-radius: 0%;">
                        <div class="product-message"> 
                            <div class="product-image">
                                <img src="{{ asset('frontend/Images1/${productMess[1]}') }}" alt="Product Image" style="border-radius: 0%;width:60px">
                            </div>
                            <div class="product-info">
                                <p class="product-id">Mã: ${productMess[0]}</p>
                                <a href="/product/${productMess[0]}" class="product-name"> ${truncatedName}</a>
                                <p class="product-name">Giá : ${productMess[3]}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            if (productMess[2] === 'Tin nhắn đã bị thu hồi') {
                return `
                <div class="outgoing-message" data-message-id="${id}">
                    <div class="message-content outgoing">
                        <p>${productMess[2]}</p>
                        <span class="time">${time}</span>
                    </div>
                </div>
                `;
            }

            var messageContainer = document.getElementById('bodyMessage');
            $(messageContainer).append(productHtml);
            scrollToBottom();
    }



    // Render messages
    function renderMessages(messages) {
        messages.forEach(function(message) {
            try {
                var messageContent = JSON.parse(message.message);
            } catch (e) {
                var messageContent = message.message;
            }

            if (Array.isArray(messageContent)) {
                renderProductMessage(messageContent,message.id);
            } else {
                if (message.check === 2) {
                    var incomingMessage = renderIncomingMessage(messageContent, message.thoigiannhan,message.id,message.emoji);
                    $(".body-message").append(incomingMessage);
                } else if (message.check === 1) {
                    var outgoingMessage = renderOutgoingMessage(messageContent, message.thoigiannhan,message.id,message.emoji);
                    $(".body-message").append(outgoingMessage);
                }
            }
        });
        scrollToBottom();
    }

        $(document).on('click', '.delete-message', function() {
            const messageId = $(this).data('message-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/message/remove/' + messageId,
                method: 'PUT',
                success: function(response) {
                    const messageElement = $(`.outgoing-message[data-message-id="${messageId}"]`);
                messageElement.find('.message-content').html(`<p>${response.message}</p><span class="time">${response.thoigiannhan}</span>`);
                messageElement.find('.message-options').css('display', 'none');
                messageElement.find('.avatar img').css('display', 'none');
                messageElement.find('.set-emoji').css('display', 'none');
                },
                error: function(xhr, status, error) {
                    console.error('Failed to remove message:', error);
                }
            });
        });


    $("#contactButton").on("click", function() {
        var masach = this.getAttribute("data-masach");
        $.ajax({
            url: '/admin/product-message/'+masach,
            type: 'GET',
            success: function(data) {
                var messageContent = JSON.parse(data.message);
                const chatContent = chatBox.find(".chat-content");
                chatContent.css("display", "block");
                closeIcon.css("display", "none");
                scrollToBottom();
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
    $.ajax({
        url: '/admin/message', 
        method: 'GET',
        success: function(response) {
            renderMessages(response);
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch messages:', error);
        }
    });
    // Send message on button click
    $("#sendButton").on("click", function() {
        var message = $("#messageInput").val(); 
        var time = new Date().toLocaleTimeString();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/message/store', 
            method: 'POST',
            data: {
                message: message, 
                check: 1,
            },
            success: function(response) {
                $("#messageInput").val('');
            },
            error: function(xhr, status, error) {
                console.error('Failed to send message:', error);
            }
        });
    });

});

</script>

