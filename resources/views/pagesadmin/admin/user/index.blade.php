
{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Quản lý nhân viên</title>
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
    'name' => 'Nhân viên',
    'key' => 'List'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Email</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $value )
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->user_phone}}</td>
                                    <td>
                                        <a href="{{route('users.edit',['id'=>$value->id])}}" class="btn btn-default">Sửa</a>
                                        <a
                                            href=""
                                            data-url="{{route('users.delete',['id'=>$value->id])}}"
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
{{--                    {{ $users-> links() }}--}}
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




