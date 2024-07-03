<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nhà xuất bản Kim đồng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Free HTML Templates">
    <meta name="description" content="Free HTML Templates">

    <!-- Favicon -->
    <link href="{{ asset('frontend/Images1/titleWebKimDong.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/myStyle.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
</head>

<body>
    <!-- Header -->
    @include('backend.dashboard.component.header')

    <!-- Page Header -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Bản tin mới</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Bản tin mới</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>{{ $tintuc->TieuDe }}</h3>
                <p class="font-italic">Thời gian: {{ $tintuc->ThoiGian }}</p>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('frontend/Images1/' . $tintuc->AnhDaiDien) }}" class="img-fluid mb-4" alt="{{ $tintuc->TieuDe }}">
                </div>
                <p style="text-indent: 30px;">{{ $tintuc->NoiDung }}</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('backend.dashboard.component.footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('frontend/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/myJS.js') }}"></script>
</body>

</html>
