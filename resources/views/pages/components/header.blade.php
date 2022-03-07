<header id="header">
    <div class="header_all" data-url="{{route('cart.deleteHeaderCart')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="/frontend/assets/img/MM.jpg" alt="logo" class="img-logo"></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="menu">
                                <li><a href="#">Pages</a>
                                    <ul class="sub-menu" style="width: 250px">
                                        <li>
                                            <a href="{{route('cart.showCart')}}">Giỏ Hàng</a>
                                        </li>
                                        <li>
                                            <?php
                                            $customer_id = Session::get('customer_id');
                                            if(!empty($customer_id)){ ?>
                                            <a href="{{route('Checkout.checkout')}}">Thông tin giao hàng</a>
                                            <?php }else{ ?>
                                            <a href="{{route('Checkout.logincheckout')}}">Thông tin giao hàng</a>
                                            <?php }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $customer_id = Session::get('customer_id');
                                            $shipping_id = Session::get('shipping_id');
                                            if(!empty($customer_id) && !empty($shipping_id)){ ?>
                                            <a href="{{route('payment.payment')}}">Phương thức thanh toán</a>
                                            <?php }elseif( empty($customer_id) ){
                                                ?>
                                                <a href="{{route('Checkout.logincheckout')}}">Phương thức thanh toán</a>
                                              <?php  }elseif( empty($shipping_id) ){ ?>
                                                <a href="{{route('Checkout.checkout')}}">Phương thức thanh toán</a>
                                                <?php }
                                            ?>
                                        </li>

                                    </ul>
                                </li>
                                <li><a href="#">Tin tức</a>
{{--                                    <ul class="sub-menu">--}}
{{--                                        <li>--}}
{{--                                            <a href="">Hàng mới về1</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="">Hàng mới về1</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="">Áo</a>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}

{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <a href="">Quần</a>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="">Áo 1</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}

{{--                                        </li>--}}

{{--                                    </ul>--}}
                                </li>
                                <li><a href="#">Thông tin</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="other">
                                <li>
                                    <form action="{{route('HomeController.search')}}" autocomplete="off" method="post">
                                        @csrf
                                        <input type="text" id="keywords" name="keyword" placeholder="Tìm kiếm">
                                        <div id="search_ajax"></div>
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </li>
                                <li>
                                    <div class="dropdown show header-user">
                                        <a class="btn btn-secondary dropdown-toggle fa fa-user show header-user" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        if(empty($customer_id)){ ?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('HomeController.login')}}">Đăng nhập</a>
                                            <a class="dropdown-item" href="{{route('HomeController.sign_up')}}">Đăng ký</a>
                                        </div>
                                        <?php } else{?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a  class="dropdown-item" href="{{route('oders.detail_oder')}}">Chi tiết đơn hàng</a>
                                            <a  class="dropdown-item" href="{{route('HomeController.updatePassword')}}">Đổi mật khẩu</a>
                                            <a style="color:red;" class="dropdown-item" href="{{route('Checkout.postlogoutcheckout')}}">Đăng Xuất</a>
                                        </div>
                                      <?php  } ?>
                                    </div>
                                </li>
                                <li>
                                    @php
                                        $number=0;
                                        $total=0;
                                        $numberSession=0;
                                        $totalSession=0;
                                    @endphp
                                    @if(isset($carts))
                                        @foreach($carts as $id => $cartItem)
                                            @php
                                                $number=$number + $cartItem['quantity'];
                                                $total=$total + $cartItem['product_price']*$cartItem['quantity'];
                                            @endphp
                                        @endforeach
                                    @endif
                                    @if(isset($cartSession))
                                        @foreach($cartSession as $id => $cartItem)
                                            @php
                                                $numberSession=$numberSession + $cartItem['quantity'];
                                                $totalSession=$totalSession + $cartItem['product_price']*$cartItem['quantity'];
                                            @endphp
                                        @endforeach
                                    @endif
                                    <div class="header-cart">
                                        <i class="header-icon fas fa-cart-plus"></i>
                                        <span class="header-cart-notice">
                                         @if(isset($carts))
                                                {{$number }}
                                            @else {{$numberSession}} @endif
                                    </span>
                                        <div class="header-cart-list">
                                            <img src="/frontend/assets/img/nocart.png" alt="" class="header-cart-list-no-cart-img">
                                            <p class="header-cart-list-no-cart-p">Chưa có sản phẩm</p>
                                            <h4 class="header-cart-heading">
                                                Sản phẩm đã thêm
                                            </h4>
                                            @if(isset($carts))
                                                @foreach($carts as $id => $cartItem)
                                                    <div class="header-cart-item" style="display: block">

                                                        <div class="row header-cart-item-magrin">
                                                            <div class="col-md-4"> <img src="{{$cartItem['product_feature_image_path']}}" alt="" class="header-cart-item-img"></div>
                                                            <div class="col-md-8 header-cart-item-info">
                                                                <div class="row ">
                                                                    <div class="col-md-6">
                                                                        <div class="header-cart-item-head-name">
                                                                            <h5>
                                                                                {{$cartItem['product_name']}}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="header-cart-item-boder-desription">
                                                                            phân loại bạc
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                      <span class="header-cart-item-head-price">
                                       {{number_format($cartItem['product_price'])}} <sup>đ</sup>
                                      </span>
                                                                            <span class="header-cart-item-head-multiple"> x</span>
                                                                            <span class="header-cart-item-head-quanlyti"> {{$cartItem['quantity']}}</span>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="header-cart-item-boder-remove">
                                                                                    <a href="" data-id="{{$id}}" class="cart_delete"> <button type="button" class="btn btn-danger ">Xóa</button></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <p>Tổng tiền sản phẩm: {{number_format($total)}} VND </p>
                                                        <a href="{{route('cart.showCart')}}">
                                                            <button type="button" class="btn btn-outline-warning float-right"> Xem giỏ hàng</button>
                                                        </a>
                                                        <?php
                                                        $customer_id = Session::get('customer_id');
                                                        $shipping_id = Session::get('shipping_id');
                                                        if(!empty($customer_id) && !empty($shipping_id)){ ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('payment.payment')}}">Mua hàng</a></button>


                                                        <?php }elseif( empty($customer_id) ){
                                                        ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('Checkout.logincheckout')}}">Mua Hàng</a></button>


                                                        <?php  }elseif( empty($shipping_id) ){ ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('Checkout.checkout')}}">Mua hàng</a></button>


                                                        <?php }
                                                        ?>

                                                    </div>

                                                </div>
                                            @elseif(isset($cartSession))
                                                @foreach($cartSession as $id => $cartItem)
                                                    <div class="header-cart-item" style="display: block">

                                                        <div class="row header-cart-item-magrin">
                                                            <div class="col-md-4"> <img src="{{$cartItem['product_feature_image_path']}}" alt="" class="header-cart-item-img"></div>
                                                            <div class="col-md-8 header-cart-item-info">
                                                                <div class="row ">
                                                                    <div class="col-md-6">
                                                                        <div class="header-cart-item-head-name">
                                                                            <h5>
                                                                                {{$cartItem['product_name']}}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="header-cart-item-boder-desription">
                                                                            phân loại bạc
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                      <span class="header-cart-item-head-price">
                                       {{number_format($cartItem['product_price'])}} <sup>đ</sup>
                                      </span>
                                                                            <span class="header-cart-item-head-multiple"> x</span>
                                                                            <span class="header-cart-item-head-quanlyti"> {{$cartItem['quantity']}}</span>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="header-cart-item-boder-remove">
                                                                                    <a href="" data-id="{{$id}}" class="cart_delete"> <button type="button" class="btn btn-danger ">Xóa</button></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <p>Tổng tiền sản phẩm: {{number_format($totalSession)}} VND </p>
                                                        <a href="{{route('cart.showCart')}}">
                                                            <button type="button" class="btn btn-outline-warning float-right"> Xem giỏ hàng</button>
                                                        </a>
                                                        <?php
                                                        $customer_id = Session::get('customer_id');
                                                        $shipping_id = Session::get('shipping_id');
                                                        if(!empty($customer_id) && !empty($shipping_id)){ ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('payment.payment')}}">Mua hàng</a></button>


                                                        <?php }elseif( empty($customer_id) ){
                                                        ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('Checkout.logincheckout')}}">Mua Hàng</a></button>


                                                        <?php  }elseif( empty($shipping_id) ){ ?>
                                                        <button type="button" class="btn btn-outline-primary float-right"><a href="{{route('Checkout.checkout')}}">Mua hàng</a></button>


                                                        <?php }
                                                        ?>                                                    </div>

                                                </div>

                                            @endif





                                        </div>

                                        <!-- nocart -->
                                        <!-- <div class="header-cart-list header-cart-list-no-cart">
                                          <img src="/frontend/assets/img/nocart.png" alt="" class="header-cart-list-no-cart-img">
                                          <p class="header-cart-list-no-cart-p">Chưa có sản phẩm</p>
                                        </div> -->
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript">
    $('#keywords').keyup(function (){
       var query = $(this).val();
       if (query != ""){
           var _token = $('input[name="_token"]').val();
           $.ajax({
               url : '{{url('/autocomplete')}}',
               method: 'post',
               data:{_token:_token,query:query},
               success:function (data){
                   $('#search_ajax').fadeIn();
                   $('#search_ajax').html(data);
               }
           });
       }else{
           $('#search_ajax').fadeOut();
       }
    });
    $(document).on('click','.li_search',function (){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();

    })
</script>
