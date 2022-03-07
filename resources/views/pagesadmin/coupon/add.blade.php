{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Thêm mã giảm giá</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Coupon',
    'key' => 'Add'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('coupon.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên mã giảm giá</label>
                                <input type="text"
                                       name="coupon_name"
                                       required
                                       value="{{old('coupon_name')}}"
                                       class="form-control " placeholder="Nhập tên mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label>Mã giảm giá</label>
                                <input type="text"
                                       name="coupon_code"
                                       required
                                       value="{{old('coupon_code')}}"
                                       class="form-control  @error('coupon_code') is-invalid @enderror>" placeholder="Nhập mã giảm giá">
                            </div>
                            @error('coupon_code')
                            <div class="alert alert-danger danger" style ="margin-top: 8px;">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Phương thức mã giảm giá</label>
                                <select name="coupon_function" class=" form-control  @error('coupon_function') is-invalid @enderror">
                                    <option value="">Chọn phương thức</option>
                                    <option value="1">Giảm theo %</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                                @error('coupon_function')
                                <div class="alert alert-danger danger" style ="margin-top: 8px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số tiền hoặc  %  giảm</label>
                                <input type="number"
                                       name="coupon_number"
                                       value="{{old('coupon_number')}}"
                                       required
                                       class="form-control " placeholder="Nhập % hoặc số tiền giảm giá">
                            </div>


                            <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
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



