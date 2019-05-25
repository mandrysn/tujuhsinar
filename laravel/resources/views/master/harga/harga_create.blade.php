@extends('layout.layout')
@section('title', 'Tambah Harga')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="widget-box">
            <div class="widget-title"> Data Harga Produk </div>
            <div role="tabpanel"> 
                
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item "><a class="btn btn-default" href="#outdoor" aria-controls="outdoor" role="tab" data-toggle="tab">Outdoor</a></li>
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
                <div role="tabpanel" class="tab-pane"  id="outdoor">
                        @include('master.harga.produk.outdoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="indoor">
                        @include('master.harga.produk.indoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="merchant">
                        @include('master.harga.produk.merchant')
                </div>
                <div role="tabpanel" class="tab-pane" id="a3">
                        @include('master.harga.produk.a3')
                </div>
                <div role="tabpanel" class="tab-pane" id="costum">
                        @include('master.harga.produk.costum')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection