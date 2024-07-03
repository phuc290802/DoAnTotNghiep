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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <style>
        .status {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .status-item {
            flex: 1;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f0f0f0; 
        }

        .status-item.shipping {
            background-color: #4caf50; 
            color: #fff; /* Màu chữ trắng */
        }


        /* Đường kẻ ngang giữa các mục */
        .status-item + .status-item {
            border-left: 0;
        }

        /* Đường viền dưới của các mục */
        .status-item {
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    @include('backend.dashboard.component.header')
    <!-- Topbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px; ">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết đơn hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/trang-chu">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đơn hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- orderdetail Start -->
    @if ($hoadonbank)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Thông tin chi tiết đơn hàng</h3>
                <p><strong>Mã đơn hàng:</strong> {{ $hoadonbank->SoHDBK }}</p>
                <p><strong>Tên khách hàng:</strong> {{ $hoadonbank->TenKH }}</p>
                <p><strong>Email:</strong> {{ $hoadonbank->email }}</p>
                <p><strong>Điện thoại:</strong> {{ $hoadonbank->DienThoai }}</p>
                <p><strong>Địa chỉ:</strong> {{ $hoadonbank->DiaChi }}</p>
                <p><strong>Ngày đặt hàng:</strong> {{ $hoadonbank->NgayBan }}</p>
                <p><strong>Ngày giao hàng dự kiến:</strong> {{ date('Y-m-d', strtotime($hoadonbank->NgayBan . ' + 3 days')) }}</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($chitiethdbk as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('frontend/Images1/'.$item->AnhDaiDien) }}" alt="{{ $item->TenSach }}" style="max-width: 60px;"></td>
                                <td>{{ $item->TenSach }}</td>
                                <td>{{ $item->SoLuongBan }}</td>
                                <td>{{ number_format($item->GiaBan, 0, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($item->SoLuongBan * $item->GiaBan, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @php
                                $total += $item->SoLuongBan * $item->GiaBan;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <p style=" text-align: right;margin-top: 10px; font-size: 18px;"><strong>Tổng tiền:</strong> {{ number_format($total, 0, ',', '.') }} VNĐ</p>
            </div>
            <div class="status col-md-12">
                <div class="status-item {{ $hoadonbank->TrangThai == '1' ? 'shipping' : '' }}">
                    Đang xử lý
                </div>
                <div class="status-item {{ $hoadonbank->TrangThai == '2' ? 'shipping' : '' }}">
                    Đang giao hàng
                </div>
                <div class="status-item {{ $hoadonbank->TrangThai == '3' ? 'shipping' : '' }}">
                    Giao hàng thành công
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- orderdetail End -->

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
