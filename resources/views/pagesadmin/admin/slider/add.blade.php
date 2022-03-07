{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>trang Slider</title>
@endsection

@section('css')
    <link href="{{asset('adm/product/add/add.css')}}" rel="stylesheet"/>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Slider',
    'key' => 'Add'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"
                                       value="{{old('name')}}"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror " placeholder="Nhập tên Slider">
                                @error('name')
                                <div class="alert alert-danger danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="3">
                                    {{old('description')}}
                                </textarea>

                                @error('description')
                                <div class="alert alert-danger danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file"
                                       name="image_path"
                                       class="form-control-file @error('image_path') is-invalid @enderror " >
                                @error('image_path')
                                <div class="alert alert-danger danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
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


