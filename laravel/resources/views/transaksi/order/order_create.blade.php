@extends('layout.layout')
@section('title', 'Tambah Data Order')
@section('content')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @if(Session::has('alert-success'))
            <div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
        @endif
        <div class="widget-box">
                        
            <div class="widget-title"> Data Harga Produk <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Costumer</a>
                    
            </div>
            <div role="tabpanel"> 
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"><a class="btn btn-default" href="#outdoor" aria-controls="outdoor" role="tab" data-toggle="tab">Outdoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#indoor" aria-controls="indoor" role="tab" data-toggle="tab">Indoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchandise</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#a3" aria-controls="a3" role="tab" data-toggle="tab">Print A3</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#costum" aria-controls="costum" role="tab" data-toggle="tab">Costum</a></li>
                </ul>
            </div>
        </div>

        <div class="widget-box">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="outdoor">
                    @include('transaksi.order.produk.outdoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="indoor">
                    @include('transaksi.order.produk.indoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="merchant">
                    @include('transaksi.order.produk.merchant')
                </div>
                <div role="tabpanel" class="tab-pane" id="a3">
                    @include('transaksi.order.produk.a3')
                </div>
                <div role="tabpanel" class="tab-pane" id="costum">
                    @include('transaksi.order.produk.costum')
                </div>
            </div>
        </div>

    </div>
</div>

@include('master.pelanggan.modal')
@endsection