
{{--sẽ load cái layouts.admin--}}
@extends('layouts.admin')

@section('title')
    <title>trang chủ</title>
@endsection
@section('css')
   <link rel="stylesheet" href="{{asset('adm/setting/index/setting.css')}}">
@endsection
@section('js')
    <script src="{{asset('adm/setting/index/setting.js')}}"></script>
    <script src="{{asset('adm/product/index/sweetalert2.js')}}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',[
    'name' => 'Setting',
    'key' => 'List'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    col12_buton--}}
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <a class="btn dropdown-toggle padding_right" data-toggle="dropdown" href="#">
                                Thêm setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('settings.create') .'?type=Text'}}">Text</a></li>
                                <li><a href="{{route('settings.create') .'?type=Textarea'}}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>
                    {{--                    endcol12_buton--}}
                    {{--                    col12_table--}}
                    <div class="col-md-12">
                        {{--                        table--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($settings as $value )
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->config_key}}</td>
                                    <td>{{$value->config_value}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',[ 'id'=> $value->id ]  ) . '?type=' .$value->type}}" class="btn btn-default">Sửa</a>
                                        <a href=""
                                           data-url="{{route('settings.delete',['id'=>$value->id])}}"
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
                <div class="col-md-12">
                    {{ $settings-> links() }}
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


