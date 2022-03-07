{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Mã giảm giá</title>
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
    'name' => 'Coupon',
    'key' => 'List'


])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <a href="{{route('coupon.create')}}" class="btn btn-success float-right ">Thêm</a>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên mã giảm giá</th>
                                <th scope="col">Mã giảm giá</th>
                                <th scope="col">Số tiền hoặc % </th>
                                <th>Gửi mã khuyễn mãi</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($coupons as $value )
                                <tr>
                                    <th scope="row">{{$value->coupon_id}}</th>
                                    <td>{{$value->coupon_name}}</td>
                                    <td>{{$value->coupon_code}}</td>
                                    @if($value->coupon_function === 1)
                                        <td>{{$value->coupon_number}}%</td>
                                    @else
                                        <td>{{ number_format($value->coupon_number)}}<sup>đ</sup></td>
                                    @endif
                                    <td>
                                        <a href="{{route('MailController.send_coupon',[

                                        'coupon_code'=>$value->coupon_code,
                                        'coupon_name'=>$value->coupon_name,
                                        'coupon_function'=>$value->coupon_function,
                                        'coupon_number'=>$value->coupon_number,
                                            ])}}"
                                           class="btn  btn-warning m-2">Gửi mã khuyến mãi</a>
                                    </td>

                                    <td>
                                        <a href=""
                                           data-url="{{route('coupon.delete',['id'=>$value->coupon_id])}}"
                                           class="btn btn-danger action_delete">Xóa</a>

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
{{--                    {{ $coupons-> links() }}--}}
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



