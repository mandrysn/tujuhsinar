@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row"> 
		@include('pembelian.transaksibeli')
		@include('pembelian.datapesan')
	</div>
	
	<div class="row"> 
		@include('pembelian.databeli')
	</div>
</div>

@endsection