<!DOCTYPE html>
<html>
<head>
	<title>Cetak Barang Pembelian</title>
	<link href="{{asset('css/root.css')}}" rel="stylesheet">
</head>
<body>
	<div align="center">
		<h2> CETAK LAPORAN PEMBELIAN</h2>
		<div class="col-md-6">
			<table class="table display">
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th style="text-align: right;">Total Harga</th>
				</tr>
				@forelse($beli as $index => $datas)
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ $datas->tgl_pembelian }}</td>
					<td>{{ $datas->status_pembayaran }}</td>
					<td align="right">Rp. {{ number_format($datas->total_harga) }}</td>
				</tr>
				@empty
				@endforelse
				<tr style="border-bottom: 1px solid silver;">
					<td align="right" colspan="3">Total Harga : </td>
					<td align="right">Rp. {{number_format($sum)}}</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>