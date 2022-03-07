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
    'name' => 'Menus',
    'key' => 'Edit'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('menus.update' , ['id'=>$menuEdit->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Menu</label>
                                <input type="text"
                                       name="name"
                                       class="form-control" placeholder="Nhập tên Menu"
                                       value="{{$menuEdit->name}}"
                                >

                            </div>
                            <div class="form-group">
                                <label>Chọn Menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn Menu cha</option>
                                    {!! $optionselect !!}

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>

                    </div>



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--sẽ load cái layouts.admin--}}


