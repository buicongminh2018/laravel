{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Thêm quai trò</title>
@endsection

@section('css')
@endsection
@section('js')
    <script>
        $('.checkbox_wrapper').on('click',function (){
            $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
        });
        $('.checkAll').on('click',function (){
            $(this).parents().find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
        })
        $('.checkAll').on('click',function (){
            $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'));
        });
    </script>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Vai trò',
    'key' => 'Add'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       value="{{old('name')}}"
                                       name="name"
                                       class="form-control  " placeholder="Nhập tên vai trò">

                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="display_name"  rows="3">
                                    {{old('display_name')}}
                                </textarea>


                            </div>

                            <div class="col-md-12">
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <lable>
                                            <input type="checkbox" class="checkAll">
                                            Check all
                                        </lable>
                                    </div>
                                    @foreach($permissionParents as $permissionParent)
                                    <div class="card bg-light mb-3 col-md-12" >
                                        <div class="card-header" style="background-color: #00b44e">
                                        <lable>
                                            <input type="checkbox"
                                                    class="checkbox_wrapper">
                                            Module {{$permissionParent->name}}
                                        </lable>
                                        </div>
                                        <div class="row">
                                            <div class="card-body col-md-12">
                                                @foreach($permissionChildren as $permissionchildItem)
                                                    @if($permissionchildItem->parent_id === $permissionParent->id)
                                                <h5 class="card-title col-md-3">
                                                    <lable>
                                                        <input type="checkbox"
                                                               value="{{$permissionchildItem->id}}"
                                                               name="permission_id[]"
                                                               class="checkbox_childrent">
                                                        {{$permissionchildItem->name}}
                                                    </lable>
                                                </h5>
                                                    @endif
                                                    @endforeach

                                            </div>
                                        </div>


                                    </div>
                                    @endforeach

                                </div>

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


