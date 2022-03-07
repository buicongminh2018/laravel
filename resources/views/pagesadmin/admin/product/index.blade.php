
{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Trang sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/js/dataTables.css') }} ">
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

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Product',
    'key' => 'List'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục sản phẩm</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($product as $value )
                                <tr>
                                    <th scope="row">{{$value->product_id}}</th>
                                    <td>{{$value->product_name}}</td>
                                    <td>{{$value->product_quantity}}</td>
                                    <td>{{number_format( $value->product_price)}} VND</td>
                                    <td>
                                        <img style="width: 150px;height: 100px" class="img" src="{{$value->product_feature_image_path}}"></td>

                                    <td>{{$value->category_name}}</td>

                                    <td>

                                        <a href="{{route('products.edit',['id'=>$value->product_id])}}" class="btn btn-default">Sửa</a>
                                        <a href=""
                                           data-url="{{route('products.delete',[ 'id'=>$value->product_id ])}}"
                                           class="btn btn-danger action_click action_delete">Xóa</a>
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
{{--                    {{ $product-> links() }}--}}
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


