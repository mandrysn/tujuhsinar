@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row"> 
		@include('piutang.data')
		@include('piutang.bayar')
	</div>

	<div class="row"> 
		<!-- Start Panel -->
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-title"> Data Pekerjaan </div>
				<div class="panel-body table-responsive">
					<table id="example0" class="table display">
						<thead>
							<tr>
								<th>No.</th>
								<th>Produk</th>
								<th>Bahan</th>
								<th>Printer</th>
								<th>Diskon</th>
								<th>Qty</th>
								<th>Harga</th>
								<th>Total Harga</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							@forelse($data as $index => $datas)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $datas->nama_produk }}</td>
								<td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
								<td>{{ is_null($datas->printer_id) ? '-' : $datas->printer->nm_printer }}</td>
								<td>{{ $datas->diskon }} %</td>
								<td>{{ $datas->qty }}</td>
								<td>Rp. {{ number_format($datas->harga) }}</td>
								<td>Rp. {{ number_format(($datas->qty * $datas->harga) - ( ($datas->qty * $datas->harga) * ($datas->diskon / 100) )) }}</td>
								<td>{!! $datas->keterangan !!}</td>
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
	</div>
</div>

@endsection