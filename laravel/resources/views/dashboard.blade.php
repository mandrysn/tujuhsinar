@extends('layout.layout')
@section('title', 'Dashboard')
@section('content')
	<div class="container-default animated fadeInRight"> <br>
		<div class="row">
			<div class="col col-lg-3">
			<div class="panel panel-default">
			 	<div class="panel-title"> ORDER <!-- <span class="label label-default pull-right">PERBULAN</span> --></div>
			 	<div class="panel-body">
			 		<h1 class="no-margins"><span data-counter="counterup" data-value="{{$order}}">0</span></h1>
			 		<small>Jumlah Order</small> </div>
			 	</div>
			 </div>
			 <div class="col col-lg-3">
			 <div class="panel panel-defaul">
				<div class="panel-title"><span class="pull-right"><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></span> TRANSAKSI </div>
			 	<div class="panel-body">
			 		<h1 class="no-margins"><span data-counter="counterup" data-value="{{number_format($trans)}}">0</span></h1>
			 		<small>Total Transaksi</small> </div>
				</div>
			</div>
			<div class="col col-lg-3">
			 <div class="panel panel-defaul">
				<div class="panel-title">PELANGGAN <span class="pull-right"><i class="fa fa-user"></i></span></div>
			 	<div class="panel-body">
			 		<h1 class="no-margins"><span data-counter="counterup" data-value="{{$pel}}">0</span></h1>
			 		<small>Total Pelanggan</small> </div>
				</div>
			</div>
			<div class="col col-lg-3">
			 <div class="panel panel-defaul">
				<div class="panel-title"><span class="pull-right"><i class="fa fa-book"></i></span> TAGIHAN </div>
			 	<div class="panel-body">
			 		<h1 class="no-margins"><span data-counter="counterup" data-value="{{ is_null($tagih) ? 0 : $tagih }}">0</span></h1>
			 		<small>Total Tagihan</small> </div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Start Right -->
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-title"> Transaksi Perhari </div>
						<div class="panel-body">
							<div>
								<div id="slineChart"></div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js')}}"></script>
<!-- Toastr -->
<script type="text/javascript" src="{{asset('js/toastr/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/toastr/toastr-plugin.js')}}"></script>
<!-- C3 --> 
<script type="text/javascript" src="{{asset('js/c3/d3.min.js')}}"></script><!-- main file --> 
<script type="text/javascript" src="{{asset('js/c3/c3.min.js')}}"></script><!-- main file --> 

<script type="text/javascript">
	$(document).ready(function () {
	'use strict';
	c3.generate({
	        bindto: '#slineChart',
	        data:{
	            columns: [
	                ['Order', <?= $tet[6].', '.$tet[5].', '.$tet[4].', '.$tet[3].', '.$tet[2].', '.$tet[1].', '.$tet[0] ?>]
	            ],
	            colors:{
	                data1: '#3F51B5'
	            },
	            type: 'spline'
	        }
	    });
	});
</script>
@endsection