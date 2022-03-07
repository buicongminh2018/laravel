{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Sửa thông tin nhân viên</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder':'Chọn quai trò'
        })
    </script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Nhân viên',
    'key' => 'Edit'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('users.update',['id'=>$users->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input type="text"
                                       value="{{$users->name}}"
                                       name="name"
                                       class="form-control " placeholder="Nhập tên nhân viên">

                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text"
                                       value="{{$users->email}}"
                                       name="email"
                                       class="form-control " placeholder="Nhập email">

                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input type="text"
                                       value="{{$users->user_phone}}"
                                       name="user_phone"
                                       pattern="[0-9]{10}"
                                       class="form-control " placeholder="Nhập số điện thoại" required>

                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control " placeholder="Nhập password">

                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>

                                    @foreach($roles as $roleItem)
                                        <option
                                            {{ $roleUser->contains('id',$roleItem->id) ? 'selected' : '' }}
                                            value="{{$roleItem->id}}">{{$roleItem->display_name}}</option>
                                    @endforeach
                                </select>


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


