
{{--sẽ load cái layouts.admin--}}
@extends('layouts.admin')

@section('title')
    <title>trang chủ</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',[
    'name' => 'Menu',
    'key' => 'List'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Menus</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($menus as $value )
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>
                                        <a href="{{route('menus.edit',[ 'id'=> $value->id ])}}" class="btn btn-default">Sửa</a>
                                        <a href="{{route('menus.delete',[ 'id'=> $value->id ])}}" class="btn btn-danger">Xóa</a>
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
                    {{ $menus-> links() }}
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


