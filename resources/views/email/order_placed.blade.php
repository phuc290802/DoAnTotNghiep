<!DOCTYPE html>
<html>
<head>
    <title>Đơn hàng được đặt thành công</title>
    <style>
        /* Reset CSS */
        body, h1, p, a {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Content */
        .content {
            margin-bottom: 20px;
        }

        /* Button */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(209, 156, 151);
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Footer */
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <h1>Đặt hàng thành công</h1>
        </div>
        <div class="content">
            <p>Cảm ơn bạn đã đặt sản phẩm, {{ $order->TenKH }}!</p>
            <p>Mã đơn hàng: {{ $order->SoHDBK }}</p>
            <p>Ngày đặt: {{ $order->NgayBan }}</p>
        </div>
        <div class="footer" style="display: flex;justify-content: center;">
            <a href="http://127.0.0.1:8000/orderdetail/{{$order->SoHDBK}}" class="button" style="color: white;margin:0 auto">Xem đơn hàng</a>
        </div>
    </div>
</body>
</html>
