{{--sẽ load cái layouts.admin--}}
@extends('pagesadmin.layouts.admin')

@section('title')
    <title>Bình luận</title>
@endsection
@section('js')
    <script src="{{asset('backend/js/delete.js')}}"></script>
    <script src="{{asset('backend/js/list.js')}}"></script>
    <script type="text/javascript">
        $('.btn_reply_comment').click(function (){
            var comment_id = $(this).data('comment_id');
            var comment_value = $('.reply_comment_'+comment_id).val();
            var comment_product_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/reply-comment')}}',
                method: 'post',
                data:{_token:_token,comment_value:comment_value,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function (data){
                    location.reload();
                    $('#notify_comment').html('<span class="text text-alert">trả lời bình luận thành công </span>');
                }
            });


        });

    </script>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('pagesadmin.partials.content-header',[
    'name' => 'Comment',
    'key' => 'List'


])
    <!-- /.content-header -->

        <!-- Main content -->
        <div id="notify_comment" style="color: red"> </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        {{--                    col12_buton--}}
                        {{--                    <div class="col-md-12">--}}
                        {{--                        <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Thêm</a>--}}
                        {{--                    </div>--}}
                        {{--                    endcol12_buton--}}
                        {{--                    col12_table--}}
                        <div class="col-md-12">
                            {{--                        table--}}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Duyệt</th>
                                    <th scope="col">Tên Người gửi</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col">sản phẩm</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($comment as $value )
                                        <form >
                                            @csrf
                                        <tr>
                                            @if($value->comment_status == 0)
                                                <th scope="row"><input  type="button" class="btn btn-primary btn-xs comment_duyet_btn" value="Chưa trả lời"></th>
                                            @else
                                                <th scope="row"><input  type="button" class="btn btn-danger btn-xs comment_duyet_btn" value="Đã trả lời"></th>
                                            @endif

                                            <td>{{$value->comment_name}}
                                            </td>
                                            <td><p style="width: 250px;word-wrap: break-word;">{{$value->comment_value}}
                                                        <br>
                                                        <textarea {{'class=reply_comment_'.$value->comment_id}} >{{$value->comment_prely}}</textarea>
                                                        <br>
                                                        <button type="button" class="btn btn-warning btn_reply_comment" id="{{$value->comment_product_id}}"  data-comment_id="{{$value->comment_id}}">Trả lời bình luận</button>
                                                    </p></td>
                                            <td><a href="{{url('detailsProduct')."/".$value->comment_product_id}}" target="_blank">{{$value->product->product_name}}</a></td>
                                        </form>
                                    @endforeach




                                </tbody>
                            </table>
                            {{--                        end table--}}
                        </div>

                    </div>
                    {{--                endcol12_table--}}

                    {{--                phantrang--}}
                    <div class="col-md-12">
                        {{ $comment-> links() }}
                    </div>

                {{--                endphantrang--}}
                <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--sẽ load cái layouts.admin--}}



