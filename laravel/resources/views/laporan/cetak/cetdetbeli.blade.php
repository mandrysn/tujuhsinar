<!DOCTYPE html>
<html>
<head>
	<title>Cetak Barang Pembelian</title>
	<link href="{{asset('css/root.css')}}" rel="stylesheet">
</head>
<body>
	<div align="center">
		<h2> CETAK LAPORAN BARANG PEMBELIAN</h2>
		<p> Tanggal : <b>{{ $beli->tgl_pembelian }}</b></p>
		<div class="col-md-6">
			<table class="table display">
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Total Harga</th>
				</tr>
				@forelse($detail as $index => $datas)
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ $datas->barang->nm_barang }}</td>
					<td>{{ $datas->qty }}</td>
					<td align="right">Rp. {{ number_format($datas->harga) }}</td>
				</tr>
				@empty
				@endforelse
				<tr style="border-bottom: 1px solid silver;">
					<td align="right" colspan="3">Total Harga : </td>
					<td align="right"><b>Rp. {{ number_format($beli->total_harga) }}</b></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>