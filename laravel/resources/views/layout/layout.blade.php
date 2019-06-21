<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script> 
    <title>@yield('title')</title>
    <!-- Css Files -->
    <link href="{{ asset('css/root.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugin/footable/footable.core.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}">
</head>
<body>
    <!-- Start Page Loading -->
    <!--<div class="loading"><img src="{{asset('img/loading.gif')}}" alt="loading-img"></div>-->
    <!-- End Page Loading --> 
    <!-- Start Top -->
    <div id="top" class="clearfix"> 
        <!-- Start App Logo -->
        <div class="applogo"> <a href="{{ route('antrian') }}" class="logo">Tujuh Sinar</a> </div>
        <!-- End App Logo --> 
        <!-- Start Sidebar Show Hide Button --> 
        <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a> <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a> 
        <!-- End Sidebar Show Hide Button --> 
    </div>
                        <!-- End Top --> 
                         @include('layout.menu')
                        <!-- Start Content -->
    <div class="content"> 
    <!-- Start Container -->
    @yield('content')
    <!-- End Container --> 
    <!-- Start Footer -->
    <div class="row footer">
        <div class="col-md-6 text-left"> Copyright &copy; GreenNusa Computindo 2018. </div>
        <div class="col-md-6 text-right"> Desain dan Dikembangkan oleh GreenNusa Computindo </div>
    </div>
    <!-- End Footer --> 
</div>
<!-- End Content --> 
<!-- Start Sidepanel -->
<div role="tabpanel" class="sidepanel"> 
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#today" aria-controls="today" role="tab" data-toggle="tab">TODAY</a></li>
        <li class="nav-item"><a class="nav-link" href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">TASKS</a></li>
        <li class="nav-item"><a class="nav-link" href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li>
    </ul>
    <!-- Tab panes -->
</div>
<!-- End Sidepanel -->
@stack('bayar')
@stack('style')
@stack('load_form')
<script>
    function goBack() {
        window.history.back();
    }
</script>
<!-- jQuery Library --> 

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> 
<script src="{{ asset('js/select2.js')}}"></script>
<!-- Bootstrap Core JavaScript File --> 
<script type="text/javascript" src="{{asset('js/bootstrap/dist/js/popper.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Bootstrap Toggle --> 
<script type="text/javascript" src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script> 
<!-- Jvectormap --> 
<script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script><!-- main file -->
<script type="text/javascript" src="{{asset('js/jvectormap/jvectormap-plugin.js')}}"></script><!-- demo codes -->  
<!-- Peity Charts --> 
<script type="text/javascript" src="{{asset('js/peity/jquery.peity.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/peity/peity-plugin.js')}}"></script><!-- demo codes --> 
<!-- Data Tables --> 
<script type="text/javascript" src="{{asset('js/datatables/datatables.min.js')}}"></script>
<!-- Bootstrap Select --> 
<script type="text/javascript" src="{{asset('js/bootstrap-select/bootstrap-select.js')}}"></script>
<!-- Sweet Alert --> 
<script type="text/javascript" src="{{asset('js/sweet-alert/sweet-alert.min.js')}}"></script> 
<!-- jQuery UI --> 
<script type="text/javascript" src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- MetisMenu --> 
<script type="text/javascript" src="{{asset('js/metismenu/metisMenu.min.js')}}"></script>
<!-- Moment.js --> 
<script type="text/javascript" src="{{asset('js/moment/moment.min.js')}}"></script> 
<!-- Bootstrap Date Range Picker --> 
<script type="text/javascript" src="{{asset('js/date-range-picker/daterangepicker.min.js')}}"></script>
<!-- Flot Chart --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-time.js')}}"></script><!-- time.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-stack.js')}}"></script><!-- stack.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-pie.js')}}"></script><!-- pie.js --> 
<script type="text/javascript" src="{{asset('js/flot-chart/flot-chart-plugin.js')}}"></script><!-- demo codes --> 
<!-- Chartist --> 
<script type="text/javascript" src="{{asset('js/chartist/chartist.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/chartist/chartist-plugin.js')}}"></script><!-- demo codes --> 
<!-- Counterup -->
<script type="text/javascript" src="{{asset('js/counterup/jquery.waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/counterup/jquery.counterup.min.js')}}"></script>
<!-- Footable -->
<script type="text/javascript" src="{{asset('js/footable/footable.all.min.js')}}"></script>


<!-- Plugin.js - Some Specific JS codes for Plugin Settings --> 
<script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>

<script type="text/javascript">
    jQuery('#jam').daterangepicker({
           
            timePicker: true,
            timePicker24Hour: true,
          
            locale: {
                format: 'HH'
            }
           
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });

    jQuery('#tanggal').daterangepicker({
            singleDatePicker: true,
           
          
            locale: {
                format: 'YYYY-MM-DD'
            }
           
        });
</script>
</body>
</html>