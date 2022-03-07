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
    'name' => 'Setting',
    'key' => 'Add'

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{route('settings.update',['id'=>$settings->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       name="config_key"
                                       value="{{$settings->config_key}}"
                                       class="form-control @error('config_key') is-invalid @enderror" placeholder="Nhập Config key">
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if( $settings->type ==='Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text"
                                           name="config_value"
                                           value="{{$settings->config_value}}"
                                           class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config value">
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif($settings->type ==='Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea
                                        name="config_value"
                                        rows="5"
                                        class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config value">
                                        {{$settings->config_value}}
                                    </textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            @endif


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


