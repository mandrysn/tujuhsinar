@extends('layout.layout')
@section('title', 'Barang Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row"> 
		<div class="col-md-12">
			<div class="panel panel-default">
				<a href="{{route('utang')}}" class="btn btn-dark"><i class="fa fa-mail-reply"></i>Kembali</a>
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
								<th style="text-align: right;" width="150">Total Harga</th>
							</tr>
						</thead>
						<tbody>
							@forelse($ewe as $index => $datas)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $datas->barang->nm_barang }}</td>
								<td>{{ $datas->qty }}</td>
								<td>{{ $datas->harga / $datas->qty }}</td>
								<td align="right">{{ $datas->harga }}</td>
							</tr>
							@empty
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right">Total Harga : </td>
								<td align="right"> {{$barang->total_harga}} </td>
							</tr>
							<tr>
								<td colspan="4" align="right">Sudah Bayar : </td>
								<td align="right"> {{$barang->total_bayar}} </td>
							</tr>
							<tr>
								<td colspan="4" align="right">Belum Bayar : </td>
								<td align="right"> {{$barang->total_harga - $barang->total_bayar}} </td>
							</tr>
							<tr>
								<form action="{{ route('pembelian.update', $barang->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<td colspan="4" align="right"><button type="submit" class="btn btn-default"><i class="fa fa-save"></i>Bayar</button></td>
									<td><input type="number" class="form-control" min="1" name="bayar" required></td>
								</form>
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