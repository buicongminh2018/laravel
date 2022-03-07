{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
@endsection

@section('css')

@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Product',
    'key' => 'Add'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
{{--                    <div class="col-md-12">--}}
{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="col-md-12">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            <div class="col-md-8">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text"
                                           name="product_name"
                                           value="{{old('product_name')}}"
                                           class="form-control @error('product_name') is-invalid @enderror " placeholder="Nhập tên sản phẩm" required>
                                    @error('product_name')
                                    <div class="alert alert-danger danger" style ="margin-top: 8px;"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Số lượng sản phẩm</label>
                                    <input type="number"
                                           required
                                           min="1"
                                           name="product_quantity"
                                           value="{{old('product_quantity')}}"
                                           class="form-control @error('product_quantity') is-invalid @enderror " placeholder="Nhập số lượng sản phẩm">
                                    @error('product_quantity')
                                    <div class="alert alert-danger danger" style ="margin-top: 8px;"> {{ $message }} </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number"
                                           required
                                           name="product_price"
                                           value="{{old('product_price')}}"
                                           class="form-control @error('product_price') is-invalid @enderror" placeholder="Nhập giá sản phẩm">
                                    @error('product_price')
                                    <div class="alert alert-danger danger " style ="margin-top: 8px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file"
                                           name="product_feature_image_path"
                                           class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label>Ảnh chi tiết</label>
                                    <input type="file"
                                           multiple
                                           name="product_image_path[]"
                                           class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Nội dung </label>
                                    <textarea rows="5" id="ckeditor1" class="form-control @error('product_content') is-invalid @enderror " name="product_content"
                                    >
                                        {{old('product_content')}}

                                    </textarea>
                                </div>
                                @error('product_content')
                                <div class="alert alert-danger danger " style ="margin-top: 8px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8">


                                <div class="form-group">
                                    <label>Chọn danh mục </label>
                                    <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        {!! $htmlChon !!}

                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger danger" style ="margin-top: 8px;">{{ $message }}</div>
                                    @enderror
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label>Nhập tags cho sản phẩm </label>--}}
{{--                                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">--}}

{{--                                    </select>--}}
{{--                                </div>--}}


                                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>

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
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{--    <script src="{{asset('vendors/select2/tinymce.min.js')}}"></script>--}}
    <script src="{{asset('adm/product/add/add.js')}}"></script>

@endsection
