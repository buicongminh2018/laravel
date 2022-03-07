@extends('pages.layouts.layout')
@section('title')
    <title>Trang giỏ hàng</title>
@endsection
@section('js')
    <script src="{{asset('frontend/js/cript.js')}}"></script>
    <script src="{{asset('backend/js/delete.js')}}"></script>
    <script src="{{asset('backend/js/list.js')}}"></script>
@endsection

@section('content')
    <div class="header_wrapper">
        @include('pages.components.header')
    </div>

    {{--    cart--}}
    <div class="cart" data-url="{{route('cart.deleteCart')}}">
        <div class="container">
         <h2 style="text-align: center;margin-bottom: 40px">Chi tiết đơn hàng</h2>
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                    <table class=" update_cart_url" data-url="{{route('cart.updateCart')}}" >
                        <tr>
                            <th style="width: 45%">Tên Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>

                        @if(isset($orderd))
                            @foreach($orderd as $id => $orderdItem)
                                <tr>
                                    <td style="word-wrap: break-word;">{{$orderdItem->product_name}}</td>
                                    <td><img style="width: 150px; height: 100px" src="{{$orderdItem->product_feature_image_path}}" alt=""></td>
                                    <td>{{$orderdItem->product_sales_quantity}}</td>
                                    <td>{{number_format($orderdItem->product_price)}}<sup>đ</sup></td>
                                    <td>{{number_format($orderdItem->product_price*$orderdItem->product_sales_quantity)}}<sup>đ</sup></td>
                                </tr>
                            @endforeach
                        @endif
                    </table>

                @if(isset($orders))

                                <h4 style="margin-top: 20px">Tiền sản phẩm: {{number_format($orders->order_total_product)}}<sup>đ</sup> </h4>
                                <h4>Giảm giá: {{number_format($orders->order_coupon)}}<sup>đ</sup></h4>
                                <h4>Phí ship: {{number_format($orders->order_phi_ship)}}<sup>đ</sup></h4>
                                <h3>Thành tiền: {{number_format($orders->order_total)}}<sup>đ</sup></h3>

                        @if($payment->payment_status == 0 )
                            <div class="col-md-9 row" ><p style="font-size: 20px;color: blue">Phương thức thanh toán: </p> <span style="font-size: 20px;color: chocolate;margin-left: 8px">Thanh toán bằng tiền mặt</span></div>
                        @else
                            <div class="col-md-9 row" ><p style="font-size: 20px;color: blue">Phương thức thanh toán: </p> <span style="font-size: 20px;color: chocolate;margin-left: 8px">Thanh toán bằng PayPal</span></div>
                        @endif
                            </div>
                @if($orders->order_status == 0 && $orders->payment_status == 0 )

                    <a style="height: 40px" onclick="return confirm('Bạn có thực sự muốn xóa đơn hàng này?');" href="{{route('oders.detail_oder_delete',['id'=>$orders->order_id])}}" class="btn btn-danger ">Xóa</a>
                @endif

                     @endif
            </div>
        </div>
    </div>
        <div class="container">
            <h2 style="text-align: center;margin: 50px 0">Đơn hàng</h2>
            <div class="container">
                <div class="cart-content row">
                    <div class="cart-content-left">
                        <table class=" update_cart_url"  >
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận hàng</th>
                                <th>Trạng thái</th>
                                <th>Số điện thoại</th>
                                <th>Thành tiền</th>
                                <th>Action</th>
                            </tr>

                            @if(isset($order))
                                @foreach($order as $orderItem)


                                    <tr>
                                        <td>{{$orderItem->order_id}}</td>
                                        <td>{{$orderItem->shipping_name}}</td>
                                        @if($orderItem->order_status == 0)
                                        <td>Đơn hàng mới</td>
                                        @elseif($orderItem->order_status == 1)
                                            <td>Đang giao hàng</td>
                                        @elseif($orderItem->order_status == 2)
                                            <td>Đã thanh toán</td>
                                        @elseif($orderItem->order_status == 3)
                                            <td>Đơn hàng đã hủy</td>
                                        @endif



                                            <td>{{$orderItem->shipping_phone}}</td>
                                        <td>{{number_format($orderItem->order_total)}}<sup>đ</sup></td>
                                        <td>
                                            <a href="{{route('oders.detail_oder_view',['id'=>$orderItem->order_id])}}" class="btn btn-warning">Xem</a>
                                            @if($orderItem->order_status == 0 && $orderItem->payment_status == 0 )

                                            <a onclick="return confirm('Bạn có thực sự muốn xóa đơn hàng này?');" href="{{route('oders.detail_oder_delete',['id'=>$orderItem->order_id])}}" class="btn btn-danger ">Xóa</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px">
                {{ $order-> links() }}
            </div>
        </div>






@endsection









