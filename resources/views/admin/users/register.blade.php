<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @include('library.Login')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card mt-5">
            <div class="card-body register-card-body p-4">
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('admin.register') }}" method="post">
                    @csrf
                    @include('admin.alert')

                    <div class="inputGroup">
                        <input name="name" type="text" required="" autocomplete="off" id="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="inputGroup">
                        <input name="email" type="email" required="" autocomplete="off" id="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="inputGroup">
                        <input name="password" type="password" required="" autocomplete="off" id="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="inputGroup">
                        <input name="passwordConfirm" type="password" required="" autocomplete="off" id="confirm">
                        <label for="confirm">Confirm Password</label>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-3">
                            <a href="{{ route('login') }}">
                                <button type="button">
                                    <span class="button_top"> Login
                                    </span>
                                </button>
                            </a>
                        </div>
                        <div class="col-4">
                            <button type="submit">
                                <span class="button_top"> Register
                                </span>
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>
            </div>

        </div><!-- /.card -->
    </div>

</body>

</html>
