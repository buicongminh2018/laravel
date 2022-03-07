{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>trang chủ</title>
@endsection

@section('css')

@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Product',
    'key' => 'Edit'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('products.update',['id'=>$product->product_id])}}" method="post" enctype="multipart/form-data">
                            <div class="col-md-8">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text"
                                           name="product_name"
                                           value="{{$product->product_name}}"
                                           class="form-control" placeholder="Nhập tên sản phẩm">

                                </div>
                                <div class="form-group">
                                    <label>Số lượng sản phẩm</label>
                                    <input type="number"
                                           name="product_quantity"
                                           value="{{$product->product_quantity}}"
                                           class="form-control" placeholder="Nhập số lượng sản phẩm">

                                </div>


                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text"
                                           name="product_price"
                                           value="{{$product->product_price}}"
                                           class="form-control  @error('product_price') is-invalid @enderror" placeholder="Nhập giá sản phẩm">
                                    @error('product_price')
                                    <div class="alert alert-danger danger " style ="margin-top: 8px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file"
                                           name="product_feature_image_path"
                                           class="form-control-file">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <img style="width: 150px; height: 100px;margin-top: 5px" class="img" src="{{$product->product_feature_image_path}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Ảnh chi tiết</label>
                                    <input type="file"
                                           multiple
                                           name="product_image_path[]"
                                           class="form-control-file">
                                    <div class="col-md-12">
                                        <div class="row">
                                            @foreach($productImage as $productImageItem)
                                                <div class="col-md-3">
                                                    <img style="width: 150px;height: 100px;margin: 5px " class="img" src="{{$productImageItem->product_image_path}}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Nội dung </label>
                                    <textarea id="ckeditor" class="form-control  " name="product_content">{{$product->product_content}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-8">


                                <div class="form-group">
                                    <label>Chọn danh mục </label>
                                    <select class="form-control select2_init" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        {!! $htmlChon !!}

                                    </select>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label>Nhập tags cho sản phẩm </label>--}}
{{--                                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">--}}
{{--                                        @foreach($product->tags as $tagItem)--}}
{{--                                            <option value="{{ $tagItem->name }}" selected> {{$tagItem->name}} </option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}
{{--                                </div>--}}


                                <button type="submit" class="btn btn-primary">Sửa thông tin sản phẩm</button>

                            </div>


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


@section('js')


@endsection
