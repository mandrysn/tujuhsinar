<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=rekap-data-pelanggan.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
 ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
    <meta name="author" content="Westilian">
    <title>MatMix - A Components Mix Admin Dashboard Template</title>
    
</head>

<body>
    <table>
				<thead>
					<tr>
						<th>No</th>
						<th>ID Member</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No. Telp/HP</th>
						<th>Email</th>
						<th>Tipe Member</th>
						<th>Pesanan Outdoor</th>
						<th>Pesanan Indoor</th>
						<th>Pesanan Print A3</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $index => $datas)
					@php($id_pelanggan = $datas->id)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>'{{ sprintf("%06s", $datas->id) }}</td>
						<td>{{ $datas->nama }}</td>
						<td>{{ $datas->alamat }}</td>
						<td>{{ $datas->no_telp }}</td>
						<td>{{ $datas->email }}</td>
						<td>{{ $datas->member->nm_tipe }}</td>
						<td>{{ Helper::totalOutdoor($id_pelanggan) }} kali</td>
						<td>{{ Helper::totalIndoor($id_pelanggan) }} kali</td>
						<td>{{ Helper::totalPrint($id_pelanggan) }} kali</td>
					</tr>
					@empty
					@endforelse
				</tbody>
				<tfoot>

				</tfoot>
    </table>
</body>

</html>