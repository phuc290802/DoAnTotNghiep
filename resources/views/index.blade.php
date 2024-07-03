
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
	@include('backend.dashboard.component.header')


    <!-- Categories Start -->
    @include('backend/dashboard/component/categoryProduct')
    <!-- Categories End -->


    <!-- Products Start -->
    @include('backend/dashboard/component/Product')
    
    <!-- Products End -->


    <!-- Subscribe Start -->

    <!-- Subscribe End -->


    <!-- Products Start -->
    @include('backend/dashboard/component/newProduct')
    <!-- Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-1')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-2')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-3')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-4')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-5')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-6')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-7')}}.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('frontend/img/vendor-8')}}.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

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

</body>

</html>