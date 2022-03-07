<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Gửi mã khuyến mãi cho khách hàng</title>
</head>
<body>
    <h3>Gửi mã cho khách hàng</h3>
    <h4>Tên mã khuyễn mãi:{{$coupon['coupon_name']}}</h4>
    <h4>Mã khuyến mãi: {{$coupon['coupon_code']}}</h4>

    <h4>Giảm giá:
        @if($coupon['coupon_function'] == 1)
            {{$coupon['coupon_number']}}%
        @endif
        @if($coupon['coupon_function'] == 2)
            {{number_format($coupon['coupon_number'])}}đ
        @endif
    </h4>
    <h3>Cho tổng đơn hàng</h3>
</body>
</html>
