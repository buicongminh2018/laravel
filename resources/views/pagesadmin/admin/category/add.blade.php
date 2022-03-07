{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Thêm danh mục sản phẩm</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('pagesadmin.partials.content-header',[
        'name' => 'Category',
        'key' => 'Add'

])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"
                                       name="category_name"
                                       value="{{old('category_name')}}"
                                       class="form-control @error('category_name') is-invalid @enderror" placeholder="Nhập tên danh mục">
                                @error('category_name')
                                <div class="alert alert-danger danger" style="margin-top: 8px">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control" name="category_parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlChon !!}

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm danh mục sản phẩm</button>
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


