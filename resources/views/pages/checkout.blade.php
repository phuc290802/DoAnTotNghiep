
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
          .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
        }

            .cart-span {
                        position: absolute;
                        left: 50px;
                        top: -10px;
                        border-radius: 100px;
                        background-color: rgb(163, 163, 163);
                        width: 18px;
                        height: 18px;
                        text-align: center;
                        color: white;
                        line-height: 18px; /* Ensures the text is vertically centered */
                        font-size: 12px; /* Adjust font size as needed */
            }
            .error-message{
                color: red;
                font-size:14px;
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/trang-chu">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Nhà xuất bản Kim Đồng</h4>
                    <h5 class="mb-4">Thông tin thanh toán</h5>
                    @if (session("CustomorUserName"))
                        @if ($khachhang)
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label style="color: rgb(209,156,151);font-weight: bold">Họ và Tên</label>
                                    <input style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" value="{{$khachhang->TenKH}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label style="color: rgb(209,156,151);font-weight: bold">Tài khoản</label>
                                    <input style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" value="{{$khachhang->UserName}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label style="color: rgb(209,156,151);font-weight: bold">Số điện thoại</label>
                                    <input  style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" value="{{$khachhang->DienThoai}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label style="color: rgb(209,156,151);font-weight: bold">Địa chỉ</label>
                                    <input style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" value="{{$khachhang->DiaChi}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <a href="/cart">Giỏ hàng</a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label style="color: rgb(209,156,151);font-weight: bold">Họ và Tên</label>
                                <input id="nameInput" name="nameInput" style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" placeholder="Họ và tên">
                                <span id="nameInputspan" class="error-message"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="color: rgb(209,156,151);font-weight: bold">E-mail</label>
                                <input id="emailInput" name="emailInput" style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" placeholder="example@email.com">
                                <span id="emailInputspan" class="error-message"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="color: rgb(209,156,151);font-weight: bold">Số điện thoại</label>
                                <input id="phoneInput" name="phoneInput" style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" placeholder="+123 456 789">
                                <span id="phoneInputspan" class="error-message"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="color: rgb(209,156,151);font-weight: bold">Địa chỉ</label>
                                <input id="diachiInput" name="diachiInput" style="height: 60px;border:3px solid rgb(237,241,255)" class="form-control" type="text" placeholder="Địa chỉ">
                                <span id="diachiInputspan" class="error-message"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <a href="/cart">Giỏ hàng</a>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="cod">
                                <label class="custom-control-label" for="cod">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="momo">
                                <label class="custom-control-label" for="momo">MoMo</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="vnpay">VnPay</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($cart as $item)
                        <div class="d-flex justify-content-between cart-item" style="margin-bottom:10px ">
                            <img src="{{ asset('frontend/Images1/'.$item['AnhDaiDien']) }}" alt="" style="width: 50px;height: 60px;">
                            <span class="cart-span">{{$item['quantity']}}</span>
                            <p style="max-width: 200px;  white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$item['TenSach']}}</p>
                            <p>{{ $item['GiaBan']}}</p>
                        </div>
                        @endforeach
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                        @php
                            // Tính tổng giá tiền cho từng sản phẩm
                            $subtotal = $item['GiaBan'] * $item['quantity'];
                            // Cộng vào tổng số tiền
                            $total += $subtotal;
                        @endphp
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền</h6>
                            <h6 class="font-weight-medium">{{$total}} VND</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">10000 VND</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng</h5>
                            <h5 class="font-weight-bold">{{$total+10000}} VND</h5>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button id="paymentButton" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout End -->


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
        document.addEventListener("DOMContentLoaded", function () {
            // Function to validate email format
            var customerIDName = '{{ session("CustomorUserName") }}';
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }
    
            // Function to validate phone number format
            function isValidPhone(phone) {
                return /^\+?\d{1,3}?\s?\d{3,}$/.test(phone);
            }
    
            // Function to handle form submission
            function handleSubmit(event) {
    event.preventDefault(); // Prevent default form submission

    // Reset previous error messages
    resetErrorMessages();

    // Get values from input fields

    let isValid = true;

    if (customerIDName === '') {
        let name = document.getElementById('nameInput').value.trim();
    let email = document.getElementById('emailInput').value.trim();
    let phone = document.getElementById('phoneInput').value.trim();
    let diachi = document.getElementById('diachiInput').value.trim();
        if (name === "") {
            displayErrorMessage('nameInputspan', 'Vui lòng nhập họ và tên.');
            isValid = false;
        }

        if (email === "") {
            displayErrorMessage('emailInputspan', 'Vui lòng nhập địa chỉ email.');
            isValid = false;
        } else if (!isValidEmail(email)) {
            displayErrorMessage('emailInputspan', 'Định dạng email không hợp lệ.');
            isValid = false;
        }

        if (phone === "") {
            displayErrorMessage('phoneInputspan', 'Vui lòng nhập số điện thoại.');
            isValid = false;
        } else if (!isValidPhone(phone)||phone.trim().length>10) {
            displayErrorMessage('phoneInputspan', 'Định dạng số điện thoại không hợp lệ.');
            isValid = false;
        }

        if (diachi === "") {
            displayErrorMessage('diachiInputspan', 'Vui lòng nhập địa chỉ.');
            isValid = false;
        }
        if (isValid) {
        $.ajax({
            url: '/cart/checkout',
            method: "GET", // Chuyển sang phương thức POST để gửi dữ liệu
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nameInput: name,
                emailInput: email,
                phoneInput: phone,
                diachiInput: diachi
            },
            success: function (response) {
                const SoHDBK = response.SoHDBK;

                // Example: Display toast notification
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

                createToast('success', 'fa-solid fa-circle-check', 'Thành công', 'Đơn hàng đặt thành công');

                // Wait for 3 seconds before redirecting to /checkout
                setTimeout(function () {
                    window.location.href = "/orderdetail/" + SoHDBK;
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    }
    }

    else {
        $.ajax({
            url: '/cart/checkout',
            method: "GET", // Phương thức GET
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
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
                    setTimeout(() => newToast.remove(), 5000); 
                }

                createToast('success', 'fa-solid fa-circle-check', 'Thành công', 'Đơn hàng đặt thành công');

                // Wait for 3 seconds before redirecting to /checkout
                setTimeout(function () {
                    window.location.href = "/checkout";
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    }
}

    
            // Function to display error message
            function displayErrorMessage(spanId, message) {
                let span = document.getElementById(spanId);
                span.textContent = message;
                span.style.display = 'inline-block'; // Show the error message
            }
    
            // Function to reset error messages
            function resetErrorMessages() {
                let errorSpans = document.querySelectorAll('.error-message');
                errorSpans.forEach(function (span) {
                    span.textContent = '';
                    span.style.display = 'none'; // Hide the error message
                });
            }
    
            function hideErrorMessage(spanId) {
                document.getElementById(spanId).textContent = '';
                document.getElementById(spanId).style.display = 'none';
            }
            if (customerIDName ==! '') {
                document.getElementById('nameInput').addEventListener('focus', function () {
                hideErrorMessage('nameInputspan');
            });
            document.getElementById('emailInput').addEventListener('focus', function () {
                hideErrorMessage('emailInputspan');
            });
            document.getElementById('phoneInput').addEventListener('focus', function () {
                hideErrorMessage('phoneInputspan');
            });
            document.getElementById('diachiInput').addEventListener('focus', function () {
                hideErrorMessage('diachiInputspan');
            });
            }
            // Attach event listeners to input fields to hide error messages on focus

            // Attach event listener to the payment button
            document.getElementById('paymentButton').addEventListener('click', handleSubmit);
        });
    </script>
    
    
    
    

</body>

</html>