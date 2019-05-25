@extends('layout.layout')
@section('title', 'Barang Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row"> 
		<div class="col-md-12">
			<div class="panel panel-default">
				<a href="{{route('pembelian.index')}}" class="btn btn-dark"><i class="fa fa-mail-reply"></i>Kembali</a>
				<br>
				<br>
				<div class="panel-title">Pembelian Barang Tanggal : {{$barang->tgl_pembelian}} </div>
				<div class="panel-body table-responsive">
					<table class="table display">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Harga Satuan</th>
								<th>Total Harga</th>
							</tr>
						</thead>
						<tbody>
							@forelse($ewe as $index => $datas)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $datas->barang->nm_barang }}</td>
								<td>{{ $datas->qty }}</td>
								<td>{{ $datas->harga / $datas->qty }}</td>
								<td>{{ $datas->harga }}</td>
							</tr>
							@empty
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right">Total Harga : </td>
								<td> {{$barang->total_harga}} </td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<!-- End Panel -->
	</div>
</div>

@endsection