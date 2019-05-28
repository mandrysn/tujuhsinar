@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
<div class="container-padding animated fadeInRight">
    <!-- Start Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">Pilih Periode</div>
                <div class="panel-body">
                    <div class="col-md-12 col-lg-4">
                        <form class="form-horizontal"  method="post" action="{{ route('laporan.detail.custom') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="controls">
                                    <div class="input-prepend input-group"> <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" id="tanggal" class="form-control span4" name="tanggal" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <div class="input-prepend input-group"> <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" id="jam" class="form-control span4" name="jam" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row --> 
                                        
</div>

@endsection