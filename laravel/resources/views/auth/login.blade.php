<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Halaman Login | Tujuh Sinar</title>
    <!-- Css Files -->
    <link href="css/root.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #F5F5F5;
        }
    </style>
</head>
<body>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">TS</h1>
            </div>
            <h3>Selamat datang di Tujuh Sinar</h3>
            <p>Silahkan login terlebih dahulu.</p>
            <form class="m-t" action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <br>
                {{-- 
                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> --}}
            </form>
            <p class="m-t"> <small>GreenNusa Computindo &copy; 2017</small> </p>
        </div>
    </div>
</body>
</html>