@extends('pages.layouts.layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('js')

    <script>
            $( "#slider-range" ).slider({
                orientation: "horizontal",
                range: true,
                min:{{$min_price}},
                max:{{$max_price}},
                steps:100000,
                values: [ {{$min_price}} , {{$max_price}} ],
                slide: function( event, ui ) {
                    $( "#amount" ).val(ui.values[ 0 ]+ "vnd" + "-" + ui.values[ 1 ]  + "vnd"  );
                    $( "#start_price" ).val(ui.values[ 0 ]);
                    $( "#end_price" ).val(ui.values[ 1 ]);
                }
            });
            $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + "vnd" +
                " -" + $( "#slider-range" ).slider( "values", 1 ) + "vnd" );
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
                    }else if(data.code === 300){
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
@endsection

@section('content')
    <div class="header_wrapper">
        @include('pages.components.header')
    </div>



    <!-- slider-category-products -->
    @php
    $x=0;
    @endphp
    <div class="container">
        <div class="slider-category-products" style="z-index: 0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @foreach($slider as $key => $sliderItem )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$key +1}}"></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item  active">
                        <img class="d-block w-100" src="{{$sliderItem->image_path}}" style="height: 600px" alt="First slide">
                        <div class="carousel-caption d-none d-md-block" style="margin: 16%;">
                            <h5 style="font-size: 50px;color: aqua;font-weight: 800;">{{$sliderItem->name}}</h5>
                            <p
                                style="
              word-wrap: break-word;
              font-size: 30px;
              color: currentColor;
              font-weight: 700;">
                                {{$sliderItem->description}}</p>
                        </div>
                    </div>
                    @foreach($slider as $key => $sliderItem )
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{$sliderItem->image_path}}" style="height: 600px" alt="First slide">
                        <div class="carousel-caption d-none d-md-block" style="margin: 16%;">
                            <h5 style="font-size: 50px;color: aqua;font-weight: 800;">{{$sliderItem->name}}</h5>
                            <p
                                style="
              word-wrap: break-word;
              font-size: 30px;
              color: currentColor;
              font-weight: 700;">
                                {{$sliderItem->description}}</p>
                        </div>
                    </div>
                    @endforeach




                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
    <!-- category -->
    <section class="category">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="category-left">
                        <h1 class="category-left-top-h1">Danh mục sản phẩm</h1>
                        <ul>
                            @foreach($categoryParent as $categoryParentItem)
                            <li class="category-left-li"><a href="{{route('categoryFrontend.index',['category_slug'=>$categoryParentItem->category_slug])}}">{{$categoryParentItem->category_name}}</a>
                                <span style="margin-left: -6px;font-size: 20px;cursor: pointer">+</span>

                                <ul>
                                    @foreach($categoryChildren as $categoryChildrenItem)
                                        @if($categoryChildrenItem->category_parent_id === $categoryParentItem->category_id)
                                            <li class="category-left-li"><a href="{{route('categoryFrontend.index',['category_slug'=>$categoryChildrenItem->category_slug])}}">* {{$categoryChildrenItem->category_name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                </div>
                <div class="col-md-8">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="dropdown  ">
                                <button class="btn btn-outline-primary dropdown-toggle form-control " type="button" data-toggle="dropdown"> <span>Sắp xếp theo</span>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a style="text-decoration: none;color: black;cursor: pointer" href="{{route('HomeController.newProduct')}}">Sắp xếp theo sản phẩm mới </a></li>
                                    <li><a style="text-decoration: none;color: black;cursor: pointer" href="{{route('HomeController.oldProduct')}}">Sắp xếp theo sản phẩm củ</a></li>
                                    <li><a style="text-decoration: none;color: black;cursor: pointer" href="{{route('HomeController.priceIncrease')}}">Sắp xếp theo giá tăng dần </a></li>
                                    <li><a style="text-decoration: none;color: black;cursor: pointer" href="{{route('HomeController.reducedPrice')}}">Sắp xếp theo giá giảm dần</a></li>
                                </ul>
                            </div>

                        </div>
                        <form class="col-md-4" style="margin-left: 8px" action="{{route('HomeController.filter_price')}}" method="get">
                            @csrf
                            <label  style="font-size: 20px;font-weight: 600;">Lọc giá</label>

                                    <div id="slider-range" style="width: 250px"></div>
                            <div class="row">
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;margin-left: 12px;margin-top: 4px;margin-bottom: 4px">
                                <input type="hidden" id="start_price" name="start_price">
                                <input type="hidden" id="end_price" name="end_price">
                            </div>
                            <input type="submit"  class="btn btn-warning" value="lọc giá" style="text-align: center">

                        </form>
                    </div>

                    <div class="row category-right-content-item">
                        @foreach($products as $productItem)
                        <div class="col-md-4 category-right-content-product">
                            <div class="card-group">
                                <div class="card" >
                                    <img class="card-img-top category-right-content-item-img" src="{{$productItem->product_feature_image_path}}">
                                    <div class="category-right-content-item-icon">
                                        <div class="category-right-content-item-icon-cart">

                                                <a
                                                    class="add_to_cart"
                                                    href=""
                                                    data-url="{{route('cart.addToCart',['id'=>$productItem->product_id])}}"
                                                >
                                                    <button type="button" class="btn btn-outline-primary"> <i class="fas fa-cart-plus"></i> </button>
                                                </a>



                                        </div>
                                        <div class="category-right-content-item-icon-eye">

                                            <a href="{{route('detailsProduct.index',['id'=>$productItem->product_id])}} "> <button type="button" class="btn btn-outline-warning"><i class="fas fa-eye"></i> </button></a>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title category-right-content-item-name"> <p>{{$productItem->product_name}}</p> </h5>
                                        <p class="card-text category-right-content-item-price">{{number_format($productItem->product_price)}} VND</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="display: flex;justify-content: center;margin-top: 50px">
                    {{$products->links()}}
                </span>
            </div>
        </div>
    </div>


@endsection








