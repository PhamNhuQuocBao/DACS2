<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @include('library.Login')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card mt-5">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @include('admin.alert')
                <form action="{{ route('admin.users.store') }}" method="post">
                    <div class="inputGroup">
                        <input name="email" type="email" required="" autocomplete="off" id="email">
                        <label for="email">email</label>
                    </div>
                    <div class="inputGroup">
                        <input name="password" type="password" required="" autocomplete="off" id="password">
                        <label for="password">password</label>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="col-7">
                            <button type="submit">
                                <span class="button_top"> Login
                                </span>
                            </button>

                            <a cl style="color: #fff;" href="{{ route('showRegister') }}">
                                <button type="button">
                                    <span class="button_top"> Register
                                    </span>
                                </button>
                            </a>
                        </div>


                        <!-- /.col -->
                    </div>

                    <div class="row">
                        <a href="{{ route('GetPassword.moveViewer') }}">Quên mật khẩu ?</a>
                    </div>
                    @csrf
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</body>

</html>
