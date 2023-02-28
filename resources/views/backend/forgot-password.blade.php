<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.svg" />
    <title>Forgot Password - Vission EMR</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .cubold{
                font-weight:600
              }
    </style>
</head>

<body class="auth-page-bg">
    <div class="container">

        <div class="auth-form px-2 mx-auto" style="max-width:550px">
            <img class="d-block mx-auto w-100 mt-5" style="max-width:250px" src="images/vission-eye-logo-circle.svg"
                alt="">
            <h1 class="text-center h2 mt-5 auth-text-primary cubold">Reset Password</h1>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="auth-form-input mt-5">
                    <img class="icon" src="images/icon-user.svg" draggable="false">
                    <input class="form-control" placeholder="E-mail" id="email" name="email"
                        type="email" minlength="8" maxlength="30" required>
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}</div>
                @endif

                @if (session('status'))
                    <div class="text-success">
                        <li> {{ session('status') }} </li>
                    </div>
                @endif
                <button type="submit" class="form-control btn-lg btn-primary h-auto mt-3 auth-bg-primary font-bold">
                   Submit
                </button>

            </form>
            <div class="text-center text-muted mt-3">
                <small>
                    &copy;
                    {{ date('Y') }} All Rights Reserved | Powered by
                    <a href="http://acetrot.com" class="text-muted text-underline" target="_blank">
                        Acetrot.com
                    </a>
                </small>
            </div>
            <img class="mt-5 w-100" src="images/login-bg.png" draggable="false" alt="">
        </div>
    </div>

    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/authentication/form-1.js"></script>


</body>

</html>
