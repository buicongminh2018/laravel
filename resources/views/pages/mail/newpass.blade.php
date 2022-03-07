
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Trang quên mật khẩu</title>
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
            height: 400px;
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
                <h3>Đăng nhập</h3>
                <h5 style="color: aqua; text-align: center;">
                    <?php
                    $messages= Session::get('messages');
                    if(!empty($messages)){
                        echo $messages;
                        Session::put('messages',null);
                    }
                    ?>
                </h5>
                <h5 style="color: red; text-align: center;">
                    <?php
                    $message= Session::get('message');
                    if(!empty($message)){
                        echo $message;
                        Session::put('message',null);
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
                @php
                $token=$_GET['token'];
                $email=$_GET['email'];
                @endphp
                <form id="login-form" class="form" action="{{route('MailController.update_new_password')}}" method="post">
                    @csrf
                    <input type="hidden" name="token"  class="form-control" value="{{$token}}">
                    <input type="hidden" name="email"  class="form-control" value="{{$email}}">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password"
                               name="customer_password"
                               class="form-control" required placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password"
                               name="customer_password2"
                               class="form-control" required placeholder="Nhập lại mật khẩu mới">
                    </div>


                    <div class="form-group">
                        <input style="width: 140px" type="submit" value="Đổi mật khẩu" class="btn float-right login_btn">
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Bạn có thể đăng ký tài khoản?<a href="{{route('HomeController.sign_up')}}">Đăng ký</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{route('HomeController.login')}}">Đăng nhập</a>
                    <a style="margin-left: 10px;color: #FFC312;text-decoration: none;}" href="{{route('index')}}">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

