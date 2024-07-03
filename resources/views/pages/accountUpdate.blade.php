<!-- resources/views/pages/accountupdate.blade.php -->

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cập nhật thông tin</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cập nhật thông tin</p>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('account.update', $khachhang->MaKH) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="TenKH">Tên:</label>
                <input type="text" class="form-control" id="TenKH" name="TenKH" value="{{ $khachhang->TenKH }}">
            </div>
            <div class="form-group">
                <label for="UserName">Tài khoản:</label>
                <input type="text" class="form-control" id="UserName" name="UserName" value="{{ $khachhang->UserName }}">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới tính:</label>
                <select class="form-control" id="GioiTinh" name="GioiTinh">
                    <option value="1" {{ $khachhang->GioiTinh == 1 ? 'selected' : '' }}>Nam</option>
                    <option value="0" {{ $khachhang->GioiTinh == 0 ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="DiaChi">Địa chỉ:</label>
                <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="{{ $khachhang->DiaChi }}">
            </div>
            <div class="form-group">
                <label for="DienThoai">Điện thoại:</label>
                <input type="text" class="form-control" id="DienThoai" name="DienThoai" value="{{ $khachhang->DienThoai }}">
            </div>
            <div class="form-group">
                <label for="AnhDaiDien">Ảnh đại diện:</label>
                <input type="text" class="form-control" id="AnhDaiDien" name="AnhDaiDien" value="{{ $khachhang->AnhDaiDien }}">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Xác nhận Mật khẩu:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
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
