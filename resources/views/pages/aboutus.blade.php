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

</head>
<body>
    <!-- Header -->
    @include('backend.dashboard.component.header')

    <!-- Page Header -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">GIỚI THIỆU NHÀ XUẤT BẢN KIM ĐỒNG</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giới thiệu Nhà xuất bản Kim Đồng</p>
            </div>
        </div>
    </div>

    <!-- Giới thiệu -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="font-size: 18px;text-indent: 30px;">
                <p>Nhà xuất bản Kim Đồng trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh là Nhà xuất bản tổng hợp có chức năng xuất bản sách và văn hóa phẩm phục vụ thiếu nhi và các bậc phụ huynh trong cả nước, quảng bá và giới thiệu văn hóa Việt Nam ra thế giới. Nhà xuất bản có nhiệm vụ tổ chức bản thảo, biên soạn, biên dịch, xuất bản và phát hành các xuất bản phẩm có nội dung: giáo dục truyền thống dân tộc, giáo dục về tri thức, kiến thức… trên các lĩnh vực văn học, nghệ thuật, khoa học kỹ thuật nhằm cung cấp cho các em thiếu nhi cũng như các bậc phụ huynh các kiến thức cần thiết trong cuộc sống, những tinh hoa của tri thức nhân loại nhằm góp phần giáo dục và hình thành nhân cách thế hệ trẻ. </p>
                <p>Đối tượng phục vụ của Nhà xuất bản là các em từ tuổi nhà trẻ mẫu giáo (1 đến 5 tuổi), nhi đồng (6 đến 9 tuổi), thiếu niên (10 đến 15 tuổi) đến các em tuổi mới lớn (16 đến 18 tuổi) và các bậc phụ huynh.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6" style="font-size: 15px">
                <h4 style="color: rgb(186,106,98)">THÔNG TIN CHUNG</h4>
                <p><strong>Tên giao dịch:</strong> Nhà xuất bản Kim Đồng</p>
                <p><strong>Tên giao dịch quốc tế:</strong> Kim Dong Publishing House</p>
                <p><strong>Ngày thành lập:</strong> 17 tháng 6 năm 1957</p>
                <p><strong>Cơ quan chủ quản:</strong> Trung ương Đoàn TNCS Hồ Chí Minh</p>

                <h5 style="color: rgb(186,106,98)">Trụ sở chính</h5>
                <p><strong>Địa chỉ:</strong> 55 Quang Trung, Hà Nội, Việt Nam</p>
                <p><strong>Điện thoại:</strong> (024) 39434730 – (024) 39428653</p>
                <p><strong>Fax:</strong> (024) 38229085</p>
                <p><strong>Email:</strong> info@nxbkimdong.com.vn</p>
            </div>
            <div class="col-md-6" style="font-size: 15px">
                <h5 style="color: rgb(186,106,98)">Chi nhánh tại TP. Hồ Chí Minh</h5>
                <p><strong>Địa chỉ:</strong> 248 Cống Quỳnh, P. Phạm Ngũ Lão, Q.1, TP. Hồ Chí Minh</p>
                <p><strong>Điện thoại:</strong> (028) 39303832 – (028) 39303447</p>
                <p><strong>Fax:</strong> (028) 39305867</p>
                <p><strong>Email:</strong> cnkimdong@nxbkimdong.com.vn</p>

                <h5 style="color: rgb(186,106,98)">Chi nhánh tại Miền Trung</h5>
                <p><strong>Địa chỉ:</strong> 102 Ông Ích Khiêm, TP Đà Nẵng, Việt Nam</p>
                <p><strong>Điện thoại:</strong> (0511) 3812333 – (0511) 3812335</p>
                <p><strong>Fax:</strong> (0511) 3812334</p>
                <p><strong>Email:</strong> cnkimdongmt@nxbkimdong.com.vn</p>
            </div>
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
