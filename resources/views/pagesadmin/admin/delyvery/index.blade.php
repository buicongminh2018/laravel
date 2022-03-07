{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Phí vận chuyển</title>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function (){
            list_delivery();
            function list_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : '{{url('/list-delivery')}}',
                    method: 'post',
                    data:{_token:_token},
                    success:function (data){
                        $('#load_delivery').html(data);
                    }
                });

            }
            $(document).on('blur','.phi_ship_edit',function (){
               var phi_ship_id = $(this).data('phiship_id');
               var phi_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : '{{url('/update-delivery')}}',
                    method: 'post',
                    data:{phi_ship_id: phi_ship_id,phi_value: phi_value,_token: _token},
                    success:function (data){
                        list_delivery();
                        alert('Sửa phí vận chuyển thành công');
                    }
                });


            });

            $('.add_delivery').click(function (){
                var city= $('.city').val();
                var province =$('.province').val();
                var wards =$('.wards').val();
                var _token = $('input[name="_token"]').val();
                var phi_ship =$('.phi_ship').val();
                $.ajax({
                    url : '{{url('/insert-delivery')}}',
                    method: 'POST',
                    data:{city:city,province:province,_token:_token,wards:wards,phi_ship:phi_ship},
                    success:function (data){
                        list_delivery();
                        alert('Thêm phí vận chuyển thành công');
                    }
                });

            })

            $('.choose').on('change',function (){
                var action = $(this).attr('id');
                var matp = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city'){
                    result= 'province';
                }else {
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,matp:matp,_token:_token},
                    success:function (data){
                        $('#'+ result ).html(data);
                    }
                });

            })
        })
    </script>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Delivery',
    'key' => ''

])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <form >
                            @csrf
                            <div class="form-group">
                                <label>Chọn thành phố</label>
                                <select class="form-control choose city" name="city" id="city">
                                    <option value="0">Chọn thành phố</option>
                                    @foreach($city as $cityItem)
                                        <option value="{{$cityItem->matp}}">{{$cityItem->name_tp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn quận huyện</label>
                                <select class="form-control choose province" name="province" id="province">
                                    <option value="0">Chọn quận quyện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn xã phường</label>
                                <select class="form-control  wards" name="wards" id="wards">
                                    <option value="0">Chọn xã phường</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phí vận chuyển</label>
                                <input type="text"
                                       name="phi_ship"
                                       value="{{old('phi_ship')}}"
                                       class="form-control phi_ship" placeholder="Nhập phí vận chuyển">

                            </div>

                            <button type="button" class="btn btn-primary add_delivery">Thêm phí vận chuyển</button>
                        </form>

                    </div>




                </div>
                <div id="load_delivery">

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--sẽ load cái layouts.admin--}}


