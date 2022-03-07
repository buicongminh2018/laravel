@extends('pages.layouts.layout')
@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection
@section('js')
    <script src="{{asset('frontend/js/cript.js')}}"></script>
    <script src="{{asset('frontend/js/product.js')}}"></script>
    <script>
        function addToCart(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            var qty=1;

            qty= $('.qty').val();
            if (qty%1 != 0){
                alert('Số lượng sản phẩm phải là số nguyên')
            }else if (qty <= 0){
                alert('Số lượng sản phẩm phải lớn hơn không')
            }else $.ajax({
                type: "GET",
                url: urlCart,
                data: {qty: qty},
                dataType: 'json',
                success: function (data){
                    if(data.code === 200){
                        $('.header_wrapper').html(data.cartHeader);
                        alert('Thêm sản phẩm thành công');
                    }
                    else if(data.code === 300){
                        $('.header_wrapper').html(data.cartHeader);
                        alert(data.message);
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
    <script type="text/javascript">
        $(document).ready(function (){
            load_comment();

            // alert(product_id);
           function load_comment(){
               var product_id = $('.comment_product_id').val();
               var _token = $('input[name="_token"]').val();
               $.ajax({
                   url : '{{url('/load-comment')}}',
                   method: 'post',
                   data:{_token:_token,product_id:product_id},
                   success:function (data){
                       $('#comment_show').html(data);
                   }
               });
           }
            $('.send-comment').click(
                function (){
                    var product_id = $('.comment_product_id').val();
                    var _token = $('input[name="_token"]').val();
                    var comment_name = $('.comment_name').val();
                    var comment_value = $('.comment_value').val();
                    $.ajax({
                        url : '{{url('/send-comment')}}',
                        method: 'post',
                        data:{_token:_token,product_id:product_id,comment_name:comment_name,comment_value:comment_value},
                        success:function (data){
                            $('#notify_commnet').html('<p class="text text-success">Gửi bình luận thành công <p/>')
                            load_comment();
                        }
                    });




                });
        });

    </script>


@endsection

@section('content')
    <div class="header_wrapper">
        @include('pages.components.header')
    </div>

    <!-- product -->
    <section class="product" style="margin-top: 100px">
        <div class="container">
          @foreach($detailsproduct as $detailsproductItem)
            <div class="row">
                <div class="col-md-6 row">
                    <div class="product-content-left-big-img">
                        <img src="{{$detailsproductItem->product_feature_image_path}}" alt="{{$detailsproductItem->product_feature_image_name}}">
                    </div>
                    <div class="product-content-left-sm-img">
                    @foreach($detailsproductimage as $detailsproductimageItem)
                        <img src="{{$detailsproductimageItem->product_image_path}}" style="margin-top: 12px">
                        @endforeach
                    </div>
                </div>
                <se class="col-md-6">
                    <div class="product-content-right-name">
                        <h2>{{$detailsproductItem->product_name}}</h2>
                        <p>Loại hàng: {{$detailsproductItem->category_name}} </p>
                    </div>
                    <div class="product-content-right-price">
                        <p>{{number_format($detailsproductItem->product_price)}} VND</p>
                    </div>
                    @if($detailsproductItem->product_quantity > 0 )
                    <div class="product-content-right-color">
                        <div class="product-content-right-size">
                            <p style="color: red;">Số lượng hàng hóa trong kho còn : <span style="color: blueviolet">{{$detailsproductItem->product_quantity}} Sản phẩm</span> </p>

                            <div class="quality">
                                <p style="font-weight: bold;margin-right: 6px">số lượng: </p>
                                <input class="qty" type="number" min=1 value="1">
                            </div>

                        </div>

                        <div class="product-content-right-button">
                            <a
                               class="add_to_cart"
                               href=""
                               data-url="{{route('cart.addToCart',['id'=>$detailsproductItem->product_id])}}"
                            >
                                <button style="width: 180px"><i class="fas fa-cart-plus"></i>  <p style="margin: 0;margin-left: 4px;">Thêm vào giỏ hàng</p></button>
                            </a>
                        </div>
                        @else
                            <h3 style="color:red;">Sản phẩm hiện tại đã hết hàng</h3>
                        @endif

                        <div class="product-content-right-icon">
                            <div class="product-content-right-icon-item">
                                <i class="fas fa-phone-alt"></i> <p style="margin: 0">Hostline</p>
                            </div>
                            <div class="product-content-right-icon-item">
                                <i class="fas fa-comments"></i> <p style="margin: 0">Chat</p>
                            </div >
                            <div class="product-content-right-icon-item">
                                <i class="fas fa-envelope"></i> <p style="margin: 0">Mail</p>
                            </div>

                        </div>

                        <div class="product-content-right-qr">
                            <img src="/frontend/assets/img/websiteQRCode_noFrame.png" alt="">
                        </div>
                        <div class="product-content-right-bottom">
                            <div class="product-content-right-bottom-top">
                                &#8744;
                            </div>
                            <div class="product-content-right-bottom-content-big">
                                <div class="product-content-right-bottom-content-title row">
                                    <div class="product-content-right-bottom-content-title-item chi-tiet">
                                        <p>Chi tiết</p>

                                    </div>
                                    <div class="product-content-right-bottom-content-title-item bao-quan">
                                        <p>Đánh giá</p>
                                    </div>
                                    <div class="product-content-right-bottom-content-title-item">
                                        <p>Bảo hành</p>
                                    </div>
                                </div>
                                <div class="product-content-right-bottom-content">
                                    <div class="product-content-right-bottom-content-chitiet">
                                       {!!$detailsproductItem->product_content!!}
                                    </div>
                                    <input type="hidden" name="comment_product_id"  value="{{$detailsproductItem->product_id}}" class="comment_product_id">
                                    <div class="product-content-right-bottom-content-baoquan">
                                        <form  >
                                            @csrf
                                            <div id="comment_show" style="max-height: 500px;overflow-y: scroll">
                                            </div>
                                            <p></p>
                                        </form>
                                        @if(Session()->get('customer_name'))
                                            <h4>Viết đánh giá</h4>
                                            <form >
                                            <input type="hidden" name="comment_name" value="{{Session()->get('customer_name')}}" class="comment_name">
                                            @csrf
                                            <textarea style="width: 100%;margin-bottom: 8px" class="comment_value" name="comment_value" placeholder="Nội dung bình luận"></textarea>
                                            <button type="button" class="btn btn-warning send-comment">Gửi bình luận</button>
                                        </form>
                                        @endif
                                        <div id="notify_commnet" style="margin-top: 8px"></div>


                                    </div>


                                </div>
                            </div>
                        </div>

        @endforeach
    </section>



    <hr>
    <!-- product related -->
    <div class="container">
        <section class="product-related">
            <div class="product-related-title">
                <p style="font-size: 24px;">Sản phẩm liên quan</p>
            </div>
            <div class="product-content row">
                @foreach($suggestProduct as $suggestProductItem)
                <div class="col-md-4 category-right-content-product">
                    <div class="card-group">
                        <div class="card" >
                            <img class="card-img-top category-right-content-item-img" src="{{$suggestProductItem->product_feature_image_path}}">
                            <div class="category-right-content-item-icon">
                                <div class="category-right-content-item-icon-cart">

                                    <a
                                        class="add_to_cart"
                                        href=""
                                        data-url="{{route('cart.addToCart',['id'=>$suggestProductItem->product_id])}}"
                                    >
                                        <button type="button" class="btn btn-outline-primary"> <i class="fas fa-cart-plus"></i> </button>
                                    </a>

                                </div>
                                <div class="category-right-content-item-icon-eye">

                                    <button type="button" class="btn btn-outline-warning"><a href="{{route('detailsProduct.index',['id'=>$suggestProductItem->product_id])}} "><i class="fas fa-eye"></i></a> </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title category-right-content-item-name"> <p>{{$suggestProductItem->product_name}}</p> </h5>
                                <p class="card-text category-right-content-item-price">{{$suggestProductItem->product_price}} VND</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </section>

    </div>





@endsection









