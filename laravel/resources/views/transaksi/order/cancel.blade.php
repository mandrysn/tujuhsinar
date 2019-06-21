@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('order.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i>Kembali</a>
					
					<br>
					<br>
					<div class="panel-title"> Data Pembelian Yang Di Cancel </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Order</th>
									<th>Pelanggan</th>
									<th>Tanggal Order</th>
									<th>Pembayaran</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="list_order">
								@forelse($data as $index => $datas)
								<tr id="order-{{ $datas->id }}" class="listnya">
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->order }}</td>
									<td>{{ $datas->pelanggan->nama }}</td>
									<td>{{ Helper::tanggalId($datas->tanggal) }}</td>
									<td>{{ $datas->status_payment }}</td>
									<td>
																	
										<form action="{{ route('order.destroy', $datas->id) }}" class="form-horizontal" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

										<a href="{{ route('order.show', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Detail</a>

										@if (Auth::user()->role == 2 || Auth::user()->role == 1)
										<button class="btn btn-danger" @if($datas->status_payment != 'belum bayar') disabled @endif onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										@endif
										</form>
										
									</td>
								</tr>
								@empty
								@endforelse
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- End Panel --> 
		</div>
		<!-- End Row --> 
	</div>
	
@endsection