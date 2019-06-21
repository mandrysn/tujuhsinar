@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
<div class="container-padding animated fadeInRight">
<!-- Start Row -->
<div id="tour-12" class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.order') }}">
                <span class="mini-stat-icon"><i class="la la-dashboard"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $order }}">0</span> Laporan Order 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.indoor') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-check-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $indoor }}">0</span> Order Indoor 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.outdoor') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-minus-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $outdoor }}">0</span> Order Outdoor 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.merchandise') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $merchandise }}">0</span> Order Merchandise 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.print') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-plus-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $print }}">0</span> Order Print A3 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.custom') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-times-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $custom }}">0</span> Order Costum 
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.hari') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-times-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $hari }}">0</span> Order Per Hari & Jam
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.invoice') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-times-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $invoice }}">0</span> Order Invoice 
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.dp') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-times-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $dp }}">0</span> Order DP 
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="mini-stat clearfix bg-twitter rounded"> 
            <a href="{{ route('laporan.tunai') }}">
                <span class="mini-stat-icon"><i class="la la-calendar-times-o"></i></span>
                <div class="mini-stat-info"> 
                    <span class="counter" data-counter="counterup" data-value="{{ $tunai }}">0</span> Order Tunai 
                </div>
            </a>
        </div>
    </div>

</div>
<!-- End Row --> 
</div>

@endsection