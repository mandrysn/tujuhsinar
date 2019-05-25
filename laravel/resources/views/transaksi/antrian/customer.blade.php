<!DOCTYPE html>
<html>
<head>
    <title>Antrian Desain Tujuh Sinar Mas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css/root.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Start Top -->
    <div id="top" class="clearfix"> 
        <!-- Start App Logo -->
        <div class="applogo"> <a href="#" class="logo">Tujuh Sinar</a></div>
        <!-- End App Logo --> 
        <!-- Start Top Right -->
        <!-- End Top Right --> 
    </div>
    <!-- End Top --> 
    <div class="row" style="margin-top: 100px">
        <div class="col-md-12" align="center">
            {{-- <div class="row"> --}}
                <div class="col-sm-12">
                    <h3>Total Antrian</h3>
                    @if($ctk != null)
                        <h1 style="font-size: 100px">{{ $ctk->nomor }}</h1>
                    @else
                        <h1 style="font-size: 100px">0</h1>
                    @endif
                </div>
                <div class="col-sm-5" align="center">
                    <a href="{{ route('antrian.cetak') }}" class="btn btn-success align-baseline">AMBIL ANTRIAN</a>
                </div>
            {{-- </div> --}}
        </div>
        <div class="col-md-12" align="center">
            <div class="col-sm-7">
                <h1>{{ \Carbon\Carbon::now() }}</h1>
            </div>
        </div>
    </div>
</body>
</html>