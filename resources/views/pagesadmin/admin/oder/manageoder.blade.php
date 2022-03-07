{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Quản lý đơn hàng</title>
@endsection
@section('js')
    <script src="{{asset('backend/js/delete.js')}}"></script>
    <script src="{{asset('backend/js/list.js')}}"></script>
    <script src="{{asset('backend/js/dataTables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/js/dataTables.css') }} ">
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
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID KH</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">Tổng giá tiền</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order as $value )
                                <tr>
                                    <th scope="row">{{$value->order_id}}</th>
                                    <td>{{$value->customer_id}}</td>
                                    <td>{{$value->created_at}}</td>
                                    @if($value->order_status == 0)
                                    <td>Đơn hàng mới</td>
                                    @elseif($value->order_status == 1)
                                    <td>Giao hàng</td>
                                    @elseif($value->order_status == 2)
                                        <td>Đã thanh toán</td>
                                    @elseif($value->order_status == 3)
                                        <td>Đơn hàng đã hủy</td>
                                    @endif
                                    @if($value->payment_status == 1 )
                                        <td>Bằng PayPal</td>
                                    @else
                                        <td>Bằng tiền mặt</td>
                                    @endif




                                        <td>{{number_format($value->order_total)}} <sup>đ</sup></td>

                                    <td>
                                        <a href="{{route('oders.view',['id'=>$value->order_id])}}" class="btn btn-default">xem</a>
                                    </td>
                                </tr>
                            @endforeach


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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--sẽ load cái layouts.admin--}}



