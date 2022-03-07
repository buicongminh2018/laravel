
{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Danh sách quai trò</title>
@endsection
@section('css')
@endsection
@section('js')
@section('js')
    <script src="{{asset('backend/js/delete.js')}}"></script>
    <script src="{{asset('backend/js/list.js')}}"></script>
@endsection
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Vai trò',
    'key' => 'List'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $value )
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->display_name}}</td>

                                    <td>
                                        <a href="{{route('roles.edit',['id'=>$value->id])}}" class="btn btn-default">Sửa</a>
                                        <a
                                            data-url="{{route('roles.delete',[ 'id'=>$value->id ])}}"
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
                <div class="col-md-12">
                    {{ $roles-> links() }}
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


