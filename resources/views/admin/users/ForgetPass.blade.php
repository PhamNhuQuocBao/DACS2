<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ForgetPassword</title>
    @include('library.Login')

    <style>
        .input-group-append {
            border-radius: none;
            background-color: red;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <legend>Please enter your email here !!!</legend>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                @include('admin.alert')
                <form action="{{route('postForgetPass')}}" method="post">

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block btn-md">Send</button>
                        </div>
                    </div>


                    @csrf
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>