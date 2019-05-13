@extends('layout.layout')
@section('title', 'Barang Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row">
		<!-- Start Panel -->
<div class="col-md-12">
	@if(Session::has('alert-utang'))
		<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-utang') }}</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-title"> Data Pembelian </div>
		<div class="panel-body table-responsive">
			<table id="example0" class="table display">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Data Barang</th>
						<th>Sudah Bayar</th>
						<th>Total Harga</th>
						<th>Belum Bayar</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse($beli as $index => $datas)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>{{ $datas->tgl_pembelian }}</td>
						<td><a href="{{route('pembelian.show', $datas->id)}}">Lihat Barang</a></td>
						<td>{{ $datas->total_bayar }}</td>
						<td>{{ $datas->total_harga }}</td>
						<td>{{ $datas->total_harga - $datas->total_bayar }}</td>
						<td>{{ $datas->status_pembayaran }}</td>
						<td>
							<a href="{{route('utangbeli', $datas->id)}}" class="btn btn-warning"><i class="fa fa-toggle-right"></i>Bayar</a>
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
</div>
@endsection