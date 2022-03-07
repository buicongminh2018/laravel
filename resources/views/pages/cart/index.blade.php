@extends('pages.layouts.layout')
@section('title')
    <title>Trang giỏ hàng</title>
@endsection
@section('js')
    <script src="{{asset('frontend/js/cript.js')}}"></script>
    <script>
        function cartUpdate(event){
            event.preventDefault();
            let urlUpdateCart=$('.update_cart_url').data('url');
            let id= $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            if (quantity%1 != 0){
                alert('Số lượng sản phẩm phải là số nguyên')
            }else if (quantity < 0){
                alert('Số lượng sản phẩm phải lớn hơn không')
            }else {
                $.ajax({
                    type: "GET",
                    url: urlUpdateCart,
                    data: {id: id, quantity: quantity},
                    success: function (data){
                        if(data.code === 200){
                            $('.cart_wrapper').html(data.cartComponent);
                            $('.header_wrapper').html(data.cartHeader);
                            alert('Cập nhật thành công');
                        }else if(data.code === 300){
                            $('.header_wrapper').html(data.cartHeader);
                            alert(data.message);

                        }

                    },
                    error: function(data){

                    }

                })
            }



        }
        function  cartDelete(event){
            event.preventDefault();
            let urlDelete = $('.cart').data('url');
            let id= $(this).data('id');
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {id: id},
                success: function (data){
                    if(data.code === 200){
                        $('.cart_wrapper').html(data.cartComponent);
                        $('.header_wrapper').html(data.cartHeader);
                        alert('Xóa thành công');
                    }

                },
                error: function(data){

                }

            })
        }
        $(function (){
            $(document).on('click','.cart_update',cartUpdate);
            $(document).on('click','.cart_delete',cartDelete);

        })
    </script>
@endsection

@section('content')
    <div class="header_wrapper">
        @include('pages.components.header')
    </div>

    {{--    cart--}}
    <div class="cart_wrapper">
        @include('pages.components.cart_component');
    </div>




@endsection









