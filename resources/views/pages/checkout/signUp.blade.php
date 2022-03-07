
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Trang đăng ký</title>
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="{{asset('frontend/assets/fonts/fontawesome-free-5.15.3-web/css/all.css')}}">

{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">--}}

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="{{asset('backend/css/stackpath.css')}}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="{{asset('backend/css/use.css')}}" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link href="{{asset('backend/css/maxcdn.css')}}" rel="stylesheet" id="bootstrap-css">
    <style>
        /* Made with love by Mutiullah Samim*/

        @import url('{{asset('backend/css/font.css')}}');

        html,body{
            background-image: url('{{asset('backend/img/544750.jpg')}}');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
            height: 700px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }

        .card-header h3{
            color: white;
        }

        .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #FFC312;
            color: black;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember{
            color: white;
        }

        .remember input
        {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn{
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover{
            color: black;
            background-color: white;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Đăng ký</h3>


                <span style="    color: aqua;font-size: 20px">
                    <?php
                    $message= Session::get('message');
                    if(!empty($message)){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </span>

                <h5 style="color: red; text-align: center;">
                    <?php
                    $message= Session::get('message');
                    if(!empty($message)){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </h5>
                <h5 style="color: red; text-align: center;">
                    <?php
                    $message= Session::get('messageErro');
                    if(!empty($message)){
                        echo $message;
                        Session::put('messageErro',null);
                    }
                    ?>
                </h5>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form id="login-form" class="form" action="{{route('Checkout.addCustomer')}}" method="post">
                    @csrf
                    @error('customer_email')
                    <div class="alert alert-danger danger" style="margin-top: -34px">{{ $message }}</div>
                    @enderror
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input  class="form-control"
                                placeholder="Nhập địa chỉ Email"
                                type="email"
                                @error('customer_email') is-invalid @enderror
                                name="customer_email"
                                value="{{old('customer_email')}}"
                                pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                required
                        >
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text"
                               value="{{old('customer_name')}}"
                               name="customer_name"
                               class="form-control" placeholder="Nhập Họ tên"
                               required
                        >

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <select class="form-control choose city" required name="customer_city" id="city" style="width:308px">
                            <option value="0">Chọn thành phố</option>
                            @foreach($city as $cityItem)
                                <option value="{{$cityItem->matp}}">{{$cityItem->name_tp}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <select class="form-control choose province" required name="customer_province" id="province" style="width:308px">
                            <option value="0">Chọn quận quyện</option>
                        </select>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <select class="form-control  wards" name="customer_wards" id="wards"  required>
                            <option value="0">Chọn xã phường</option>
                        </select>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input
                               type="text"
                               value="{{old('customer_address')}}"
                               name="customer_address"
                               class="form-control"
                               placeholder="Nhập địa chỉ"
                               required
                        >

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text"
                               pattern="[0-9]{10}"
                               value="{{old('customer_phone')}}"
                               name="customer_phone"
                               class="form-control"
                               placeholder="Nhập số điện thoại"
                               required
                        >

                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password"
                               name="customer_password"
                               class="form-control" required placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <input style="width: 110px" type="submit" value="Đăng ký" class="btn float-right login_btn check">
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Bạn có thể đăng nhập?<a href="{{route('Checkout.logincheckout')}}">Đăng nhập</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{route('MailController.forget_password')}}">Quên mật khẩu</a>
                    <a style="margin-left: 10px;color: #FFC312;text-decoration: none;}" href="{{route('index')}}">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
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
<script type="text/javascript">
    $(document).ready(function () {
       $('.click').click(function (){
           // var matp= ('.city').val();
           // var maqh= ('.province').val();
           // var maxa= ('.wards').val();
           alert('Làm ơn chọn thành phố quận quyện xã');
           // if(matp == '' && maqh == '' && maxa == ''){
           //     alert('Làm ơn chọn thành phố quận quyện xã');
           // }
       })
    });

</script>
</body>
</html>
