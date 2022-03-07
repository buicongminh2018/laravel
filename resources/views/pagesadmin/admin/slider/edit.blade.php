{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>trang slider</title>
@endsection

@section('css')
    <link href="{{asset('adm/product/add/add.css')}}" rel="stylesheet"/>
    <link href="{{asset('adm/product/index/list.css')}}" rel="stylesheet"/>
@endsection




@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Slider',
    'key' => 'Edit'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"
                                       value="{{$slider->name}}"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror " placeholder="Nhập tên Slider">
                                @error('name')
                                <div class="alert alert-danger danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="3">
                                    {{$slider->description}}
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
                                <div class="col-md-4">
                                    <div class="row">
                                        <div> <img style="width: 300px;height: 200px" class="img_200_300 margin" src="{{$slider->image_path}}" ></div>
                                    </div>
                                </div>
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


