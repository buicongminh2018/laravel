<div class="cart" data-url="{{route('cart.deleteCart')}}">
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table class=" update_cart_url" data-url="{{route('cart.updateCart')}}" >
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        {{--                            <th>Màu</th>--}}
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $totalAll=0;
                        $numberAll=0;

                    @endphp
                    @if(isset($carts))
                    @foreach($carts as $id => $cartItem)
                        @php
                            $totalAll= $totalAll + $cartItem['product_price']*$cartItem['quantity'];
                            $numberAll=$numberAll + $cartItem['quantity'];
                        @endphp

                        <tr>
                            <td><img src="{{$cartItem['product_feature_image_path']}}" alt=""></td>
                            <td><p>{{$cartItem['product_name']}}</p></td>
                            {{--                            <td><img src="/frontend/assets/img/111.jpg" alt=""></td>--}}
                            <td><p>{{number_format($cartItem['product_price'])}} <sup>đ</sup></p></td>
                            <td><input class="quantity" type="number" value="{{$cartItem['quantity']}}" min="1"></td>
                            <td><p>{{number_format($cartItem['product_price']*$cartItem['quantity'])}} <sup>đ</sup></p></td>
                            <td>
                                <a href=""  data-id="{{$id}}" class="cart_update"> <button type="button" class="btn btn-primary">Cập nhật</button></a>
                                <a href="" data-id="{{$id}}" class="cart_delete"> <button type="button" class="btn btn-danger ">Xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                    @endif

                </table>
            </div>
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td>{{ $numberAll}}</td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td><p>{{number_format($totalAll)}} <sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td><p style="color: black; font-weight: bold;">{{number_format($totalAll)}} <sup>đ</sup></p></td>
                    </tr>
                </table>
{{--                <div class="cart-content-right-text">--}}
{{--                    <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>--}}
{{--                    <p style="color: red; font-weight: bold;">Mua thêm <span style="font-size: 18px;">131.000đ</span> để được miễn phí SHIP</p>--}}
{{--                </div>--}}
                <div class="cart-content-right-button row" style="margin-top: 20px">
                    <a href="{{route('index')}}" style="margin-left: 10px;"><button style="background-color: darkgrey;">TIẾP TỤC MUA SẮM</button></a>
                    <?php
                    $customer_id = Session::get('customer_id');
                    if(!empty($customer_id)){ ?>
                        <a href="{{route('Checkout.checkout')}}"><button>THANH TOÁN</button></a>
                    <?php }else{ ?>
                        <a href="{{route('Checkout.logincheckout')}}"><button>THANH TOÁN</button></a>
                   <?php }
                    ?>
                </div>
                <div class="cart-content-right-dangnhap">
                    <p>Hãy <a href="{{route('Checkout.logincheckout')}}">Đăng nhập</a>tài khoản của bạn để có thể thanh toán</p>

                </div>
            </div>
        </div>
    </div>
</div>
