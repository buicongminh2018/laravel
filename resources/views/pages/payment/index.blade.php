@extends('pages.layouts.layout')
@section('title')
    <title>Chọn phương thức thanh toán</title>
@endsection
@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var usd= document.getElementById("vnd_to_usd").value;

        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AdHHO3o_BXE_K3zV-1R9vP_tUH_K-9iJ1-x1wodnuFLUqx1epVDdRi6kR-9OI-cbw3gyRPkTQCtF74eY',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: `${usd}`,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url : '{{url('/oder-paypal')}}',
                        method: 'post',
                        data:{_token:_token},
                        success:function (data){
                            window.alert('Cảm ơn bạn đã mua hàng !');
                            location.reload();
                        }
                    });

                });
            }
        }, '#paypal-button');

    </script>
    <script src="{{asset('frontend/js/cript.js')}}"></script>
    <script src="{{asset('frontend/js/category.js')}}"></script>
    <script>
        function addToCart(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function (data){
                    if(data.code === 200){
                        $('.header_wrapper').html(data.cartHeader);
                        alert('Thêm sản phẩm thành công');
                    }

                },
                error: function (data){
                    console.log(data);
                }

            });
        }
        function  cartDelete(event){
            event.preventDefault();
            let urlDelete = $('.header_all').data('url');
            let id= $(this).data('id');
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {id: id},
                success: function (data){
                    if(data.code === 200){
                        $('.header_wrapper').html(data.cartHeader);
                        alert('Xóa thành công');
                        location.reload();
                    }

                },
                error: function(data){

                }

            })
        }


        $(function (){
            $('.add_to_cart').on('click',addToCart);
            $(document).on('click','.cart_delete',cartDelete);
        });
    </script>
@endsection

@section('content')
    <div class="header_wrapper">
        @include('pages.components.header')
    </div>
        <section class="payment">
            <div class="container">
                <div class="payment-top-wrap">
                    <div class="payment-top">
                        <div class="payment-top-delivery payment-top-item">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="payment-top-adress payment-top-item">
                            <i class="fas fa-map-marker-alt "></i>
                        </div>
                        <div class="payment-top-payment payment-top-item">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('Checkout.oder')}}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="payment-content row">
                                <div class="payment-content-left">
                                    {{--                        <div class="payment-content-left-method-delivery">--}}
                                    {{--                            <p style="font-weight: bold;">Phương thức giao hàng</p>--}}
                                    {{--                            <div class="payment-content-left-method-delivery-item">--}}
                                    {{--                                <input checked name="payment_option" type="checkbox">--}}
                                    {{--                                <label for="">Giao hàng chuyển phát nhanh</label>--}}
                                    {{--                            </div>--}}
                                    {{--                        </div>--}}
                                    <div class="payment-content-left-method-payment">
                                        <p style="font-weight: bold;">Phương thức thanh toán</p>
                                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                                        {{--                            <div class="payment-content-left-method-payment-item">--}}
                                        {{--                                <input name="payment_option" type="checkbox">--}}
                                        {{--                                <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label>--}}
                                        {{--                            </div>--}}
                                        {{--                            <div class="payment-content-left-method-payment-item-img">--}}
                                        {{--                                <img src="/frontend/assets/img/visa.png" alt="">--}}
                                        {{--                            </div>--}}
                                        <div class="payment-content-left-method-payment-item">
                                            <label for=""> Thanh toán bằng Paypal</label>
                                        </div>
                                        <div id="paypal-button"></div>


                                        <div class="payment-content-left-method-payment-item-img">
{{--                                            <img src="/frontend/assets/img/the-atm-la-gi-f488.jpg" alt="">--}}
                                        </div>
                                        {{--                            <div class="payment-content-left-method-payment-item">--}}
                                        {{--                                <input name="method-payment" type="radio">--}}
                                        {{--                                <label for="">  Thanh toán Momo</label>--}}
                                        {{--                            </div>--}}
                                        {{--                            <div class="payment-content-left-method-payment-item-img">--}}
                                        {{--                                <img src="/frontend/assets/img/vi-momo-la-gi.png" alt="">--}}
                                        {{--                            </div>--}}
                                        <div class="payment-content-left-method-payment-item">
                                            <input value="2" name="payment_method" type="checkbox">
                                            <label for="">  Thu tiền tận nơi</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="payment-content-right-payment">
                                <button onclick="return confirm('Bạn có thực sự muốn mua hàng?');" type="submit">TIẾP TỤC THANH TOÁN</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    @if(request()->message)
                        <p style="    color: blue;font-size: 20px;text-align: center;">{{request()->message}}</p>
                    @endif
                        @if(request()->messageEror)
                            <p style="    color: red;font-size: 20px;text-align: center;">{{request()->messageEror}}</p>
                        @endif
                    <form action="{{route('coupon.checkcoupon')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="payment-content-right">
                                <div class="payment-content-right-button">
                                    <input type="text" name="coupon_code" class="form-control" placeholder="Nhập mã khuyến mãi">
                                    <button type="submit" style="margin-left: -90px" class="form-control"><i class="fas fa-check"></i></button>
                                </div>
                            </div>
                            @if(Session::get('coupon'))
                                <a href="{{route('coupon.unsetcoupon')}}" class="btn btn-danger" style="margin: 8px;height: 38px;">Xóa mã khuyễn mãi</a>
                            @endif
                        </div>

                    </form>

                    @php
                        $number=0;
                        $total=0;
                        $x=0;
                    @endphp
                    @if(isset($cartSession))
                        @foreach($cartSession as $id => $cartItem)
                            @php
                                $number=$number + $cartItem['quantity'];
                                $total=$total + $cartItem['product_price']*$cartItem['quantity'];
                                $x=$x+1;
                            @endphp
                        @endforeach
                    @endif
                    <div>
                        <table class="table" style="width: 500px">
                            <thead>
                            <tr>
                                <th scope="col">Tổng số tiền mua sản phẩm:</th>
                                <th scope="col">{{number_format($total)}} <sup>đ</sup></th>
                            </tr>
                            <tr>
                                <th scope="col">Phi vận chuyển:</th>
                                <th scope="col">{{number_format(Session::get('$phi_ship')*$x)}}  <sup>đ</sup></th>
                            </tr>
                            <tr>
                                <th scope="col">Giảm giá:</th>
                                @php
                                    $total_coupon =0;
                                @endphp
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_function'] == 1 )
                                            Mã giảm giá: {{$cou['coupon_number']}}%
                                            @php
                                                $total_coupon=$total*$cou['coupon_number']/100;
                                            @endphp
                                        @else
                                            Mã giảm giá: {{number_format($cou['coupon_number'])}}<sup>đ</sup>
                                            @php
                                                $total_coupon=$cou['coupon_number'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif

                                <th scope="col">{{number_format($total_coupon)}}  <sup>đ</sup></th>
                            </tr>

                            </thead>
                            <tbody>
                            @php
                            $phiship=0;
                            $phishipsession=Session::get('$phi_ship');
                            if ($phishipsession > 0){
                                $phiship=$phishipsession;
                            }
                            @endphp
                            <tr>
                                <th scope="row">Thành tiền</th>
                                @if($total - $total_coupon < 0 )
                                    <td style="color:crimson;">0 <sup>đ</sup></td>
                                @else
                                <td style="color:crimson;">{{number_format($total-$total_coupon+$phiship*$x)}} <sup>đ</sup></td>
                                @endif
                            </tr>
                            @php
                              $vnd_to_usd= ($total-$total_coupon+$phiship*$x)/22756;
                            @endphp
                            <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">

                            </tbody>
                        </table>

                    </div>

                </div>




            </div>

        </section>








@endsection








