@extends('pages.layouts.layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('js')
    <script src="{{asset('frontend/js/cript.js')}}"></script>
    <script src="{{asset('frontend/js/category.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.choose').on('change',function (){
                var action = $(this).attr('id');
                var matp = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city'){
                    result= 'province';
                }else {
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,matp:matp,_token:_token},
                    success:function (data){
                        $('#'+ result ).html(data);
                    }
                });

            })
        })
    </script>

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

    <section class="delivery">
        <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="delivery-top-adress delivery-top-item">
                        <i class="fas fa-map-marker-alt "></i>
                    </div>
                    <div class="delivery-top-payment delivery-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="delivery-content row">
                    <div class="delivery-content-left">
                        <form action="{{route('Checkout.savecheckoutcustomer')}}" method="post">
                            @csrf
                        <p>Vui lòng chọn địa chỉ giao hàng</p>
                        <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ tên <span style="color: red;">*</span></label>
                                <input type="text" name="shipping_name">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Điện thoại <span style="color: red;">*</span></label>
                                <input  pattern="[0-9]{10}" type="text" name="shipping_phone">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Tỉnh/Tp <span style="color: red;">*</span></label>
                                <div class="form-group"  >
                                    <select class="form-control choose city" name="shipping_city" id="city" style="width:308px">
                                        <option value="0">Chọn thành phố</option>
                                        @foreach($city as $cityItem)
                                            <option value="{{$cityItem->matp}}">{{$cityItem->name_tp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Quận/Huyện <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <select class="form-control choose province" name="shipping_district" id="province" style="width:308px">
                                        <option value="0">Chọn quận quyện</option>
                                    </select>
                                </div>
                            </div>




                            {{--                            <div class="delivery-content-left-input-top-item">--}}
{{--                                <label for="">Tỉnh/Tp <span style="color: red;">*</span></label>--}}
{{--                                <input type="text" name="shipping_city" required>--}}
{{--                            </div>--}}
{{--                            <div class="delivery-content-left-input-top-item">--}}
{{--                                <label for="">Quận/Huyện <span style="color: red;">*</span></label>--}}
{{--                                <input type="text" name="shipping_district" required>--}}
{{--                            </div>--}}
                        </div>
                            <div class="delivery-content-left-input-bottom" style="margin: -14px;">
                                <div class="form-group">
                                    <label>Chọn xã phường <span style="color: red;">*</span></label>
                                    <select class="form-control  wards" name="shipping_wards" id="wards" style="width: 96%">
                                        <option value="0">Chọn xã phường</option>
                                    </select>
                                </div>                            </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" name="shipping_address">
                        </div>
                        <div class="delivery-content-left-button row">
                            <a href="{{route('cart.showCart')}}"><span>«</span><p>Quay lại giỏ hàng</p></a>
                            <button type="submit"><p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p></button>
                        </div>
                        </form>
                    </div>

                <div class="delivery-content-right">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th></th>
                            <th style="width: 30%">Thành tiền</th>
                        </tr>
                        @php
                            $number=0;
                            $total=0;
                            $numberSession=0;
                            $totalSession=0;
                        @endphp
                        @if(isset($cartSession))
                            @foreach($cartSession as $id => $cartItem)
                                @php
                                    $totalSession= $totalSession +$cartItem['product_price']*$cartItem['quantity'];
                                @endphp
                            <tr>
                            <td>{{$cartItem['product_name']}}</td>
                            <td> {{$cartItem['quantity']}}</td>
                                <td></td>
                            <td><p>{{number_format($cartItem['product_price']*$cartItem['quantity'])}} <sup>đ</sup></p></td>
                            </tr>
                            @endforeach
                        @endif

                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng</td>
                            <td style="font-weight: bold;"><p>{{number_format($totalSession)}} <sup>đ</sup></p></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                            <td style="font-weight: bold;"><p>{{number_format($totalSession)}} <sup>đ</sup></p></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </section>








@endsection








