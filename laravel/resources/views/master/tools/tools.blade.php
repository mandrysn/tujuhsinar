@extends('layout.layout')
@section('title', 'Dashboard')
@section('content')
	<div class="container-widget animated fadeInRight">
		
		<div class="row">
			<div class="col-lg-12">
				<div role="tabpanel">
						<div id="tour-12" class="row">
								
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<a href="{{ route('barang.index') }}">
									<div class="mini-stat clearfix bg-facebook rounded"> 
										<div class="mini-stat-info"> 
											Setting Bahan <br />
										</div>
									</div>
								</a>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<a href="{{ route('editor.index') }}">
									<div class="mini-stat clearfix bg-facebook rounded"> 
										<div class="mini-stat-info"> 
											Setting Finishing <br />
										</div>
									</div>
								</a>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<a href="{{ route('kaki.index') }}">
									<div class="mini-stat clearfix bg-facebook rounded"> 
										<div class="mini-stat-info"> 
											Setting Kaki <br />
										</div>
									</div>
								</a>
							</div>
							
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection