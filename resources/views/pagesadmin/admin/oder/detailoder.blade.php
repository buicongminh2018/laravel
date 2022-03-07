{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Quản lý đơn hàng</title>
@endsection
@section('js')
    <script src="{{asset('backend/js/delete.js')}}"></script>
    <script src="{{asset('backend/js/list.js')}}"></script>
    <script type="text/javascript">
        $('.order_d').change(function (){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();
            var order_status_oder = $('.order_status_oder').val();


            order_quantity =[];
            $("input[name='product_sales_quantity']").each(function (){
                order_quantity.push($(this).val());
            });
            oder_product_id=[];
            $("input[name='oder_product_id']").each(function (){
                oder_product_id.push($(this).val());
            });
            x=0;
            if (order_status ==1 && order_status_oder == 2 || order_status ==2 && order_status_oder == 1){
                x=0;
            }else {
                if(order_status ==1 || order_status ==2){
                    for ( i=0 ; i < oder_product_id.length ; i++){
                        // alert(oder_product_id[i]);
                        var oder_qty = $('.order_qty_' + oder_product_id[i]).val();
                        var oder_qty_storage = $('.oder_qty_storage_' + oder_product_id[i]).val();
                        if (parseInt(oder_qty)  > parseInt(oder_qty_storage) ){
                            x=x+1;
                            $('.color_qty_'+ oder_product_id[i]).css('background','red');
                        }
                    }
                }

            }

            if (x ==0 ){
                $.ajax({
                    url : '{{url('/update-quantity-oder')}}',
                    method: 'post',
                    data:{_token:_token,order_status:order_status,order_id:order_id,order_quantity:order_quantity,oder_product_id:oder_product_id},
                    success:function (data){
                        alert('Cập nhật đơn hàng thành công');
                        location.reload();
                    }
                });
            }else{
                alert('Số lượng sản phẩm trong kho không đủ');
            }

        });

    </script>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'order',
    'key' => 'manage'


])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}

                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                            <h3 style="text-align: center;">Thông tin khách hàng</h3>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                            </thead>
                            <tbody>

{{--                            @foreach($order as $value )--}}
                                <tr>
                                   <td>{{$order->customer_name}}</td>
                                    <td>{{$order->customer_phone}}</td>
                                </tr>
{{--                            @endforeach--}}


                            </tbody>
                        </table>
                        {{--                        end table--}}
                    </div>

                </div>
                {{--                endcol12_table--}}

                {{--                phantrang--}}
{{--                <div class="col-md-12">--}}
{{--                    {{ $order-> links() }}--}}
{{--                </div>--}}

            {{--                endphantrang--}}
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}

                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <h3 style="text-align: center;">Thông tin vận chuyển</h3>
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên người vận chuyển</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại </th>

                            </tr>
                            </thead>
                            <tbody>

                            {{--                            @foreach($order as $value )--}}
                            <tr>
                                <td>{{$order->shipping_name}}</td>
                                <td>TP/Tỉnh: {{$shipping->name_tp}}, Quận/Huyện: {{$shipping->name_qh}}, <br> Xã/Phường: {{$shipping->name_xa}}, {{$order->shipping_address}} </td>
                                <td>{{$order->shipping_phone}}</td>
                            </tr>
                            {{--                            @endforeach--}}


                            </tbody>
                        </table>
                        {{--                        end table--}}
                    </div>

                </div>
            {{--                endcol12_table--}}

            {{--                phantrang--}}
            {{--                <div class="col-md-12">--}}
            {{--                    {{ $order-> links() }}--}}
            {{--                </div>--}}

            {{--                endphantrang--}}
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}

                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <input type="hidden" class="order_status_oder" value="{{$order->order_status}}">
                    @if($payment->payment_status == 0 )
                        <div class="col-md-9 row" ><p style="font-size: 20px;color: blue">Phương thức thanh toán: </p> <span style="font-size: 20px;color: chocolate;margin-left: 8px">Thanh toán bằng tiền mặt</span></div>
                    @else
                        <div class="col-md-9 row" ><p style="font-size: 20px;color: blue">Phương thức thanh toán: </p> <span style="font-size: 20px;color: chocolate;margin-left: 8px">Thanh toán bằng PayPal</span></div>
                    @endif
                    <div class="col-md-3">
                        @if($order->order_status === 0)
                        <form >
                            @csrf
                            <select class="form-control order_d">
                                <option id="{{$order->order_id}}" selected value="0">Đơn hàng mới</option>
                                <option id="{{$order->order_id}}" value="1">Giao hàng</option>
                                <option id="{{$order->order_id}}" value="2">Đã thanh toán</option>
                                <option id="{{$order->order_id}}" value="3">Đơn hàng đã hủy</option>
                            </select>
                        </form>
                        @elseif($order->order_status === 1)
                                <form >
                                    @csrf
                                    <select class="form-control order_d">
                                        <option id="{{$order->order_id}}" value="0">Đơn hàng mới</option>
                                        <option id="{{$order->order_id}}" selected value="1">Giao hàng</option>
                                        <option id="{{$order->order_id}}" value="2">Đã thanh toán</option>
                                        <option id="{{$order->order_id}}" value="3">Đơn hàng đã hủy</option>

                                    </select>
                                </form>
                        @elseif($order->order_status === 2)
                            <form >
                                @csrf
                                <select class="form-control order_d">
                                    <option id="{{$order->order_id}}" value="0">Đơn hàng mới</option>
                                    <option id="{{$order->order_id}}" value="1">Giao hàng</option>
                                    <option id="{{$order->order_id}}" selected value="2">Đã thanh toán</option>
                                    <option id="{{$order->order_id}}" value="3">Đơn hàng đã hủy</option>
                                </select>
                            </form>
                        @elseif($order->order_status === 3)
                            <form >
                                @csrf
                                <select class="form-control order_d">
                                    <option id="{{$order->order_id}}" value="0">Đơn hàng mới</option>
                                    <option id="{{$order->order_id}}" value="1">Giao hàng</option>
                                    <option id="{{$order->order_id}}"  value="2">Đã thanh toán</option>
                                    <option id="{{$order->order_id}}" selected value="3">Đơn hàng đã hủy</option>
                                </select>
                            </form>
                        @endif

                    </div>
                    <div class="col-md-12">
                        {{--                        table--}}
                        <h3 style="text-align: center;">Liệt kê đơn hàng</h3>
                        <br>
                        @if($order->order_total_product <= 0 )
                            <h5>Tổng tiền sản phẩm: 0 <sup>đ</sup></h5>
                            <h5>Giảm giá: 0 <sup>đ</sup></h5>
                            <h5>Phí vận chuyển: 0 <sup>đ</sup></h5>
                        @else
                        <h5>Tổng tiền sản phẩm: {{number_format($order->order_total_product)}} <sup>đ</sup></h5>
                        <h5>Giảm giá: {{number_format($order->order_coupon)}} <sup>đ</sup></h5>
                        <h5>Phí vận chuyển: {{number_format($order->order_phi_ship)}} <sup>đ</sup></h5>
                        @endif
                        <h3>Tổng tiền: {{number_format($order->order_total)}} <sup>đ</sup></h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng kho còn</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orderd as $orderdItem )
                            <tr class="color_qty_{{$orderdItem->product_id}}">
                                <td>{{$orderdItem->product_name}}</td>
                                <td>{{$orderdItem->product_quantity}}</td>
                                <td>{{$orderdItem->product_sales_quantity}}</td>
                                <input type="hidden" class="order_qty_{{$orderdItem->product_id}}" min="1" value="{{$orderdItem->product_sales_quantity}}" name="product_sales_quantity">
                                <input type="hidden" value="{{$orderdItem->product_quantity}}" name="oder_qty_storage" class="oder_qty_storage_{{$orderdItem->product_id}}">
                                <input type="hidden" min="1" value="{{$orderdItem->product_id}}" name="oder_product_id" class="oder_product_id">
                                <td>{{number_format($orderdItem->product_price)}} <sup>đ</sup></td>
                                <td>{{number_format($orderdItem->product_price*$orderdItem->product_sales_quantity)}} <sup>đ</sup></td>
                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{--                        end table--}}
                    </div>
                    <a target="_blank" href="{{route('oders.printOder',['checkcode'=>$orderdItem->order_id])}}" class="btn btn-info">In đơn hàng</a>
                </div>
            {{--                endcol12_table--}}

{{--                            phantrang--}}
                            <div class="col-md-12">
                                {{ $orderd-> links() }}
                            </div>

            {{--                endphantrang--}}
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--sẽ load cái layouts.admin--}}



