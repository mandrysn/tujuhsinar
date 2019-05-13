<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Foxlabel - Bootstrap Admin Template</title>
    <!-- Css Files -->
    <link href="{{asset('css/root.css')}}" rel="stylesheet">
    <style type="text/css">
        body {
            background: #F5F5F5;
        }
    </style>
</head>
<body>
    <div class="middle-box text-center animated fadeInDown">
        <h1>403</h1>
        <h3 class="font-bold">Page Not Found</h3>
        <div class="error-desc">
            Maaf, Halaman ini tidak tersedia untuk Anda. Silahkan ke halaman awal. <br><br>
            <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        </div>
</div>
<script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>