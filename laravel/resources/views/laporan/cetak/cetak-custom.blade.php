<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=rekap-data-custom.xls");
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
                            <th data-toggle="true">No</th>
                            <th data-hide="all">No Order</th>
                            <th data-hide="phone">Costumer</th>
                            <th data-hide="all">Keterangan</th>
                            <th data-hide="phone">Deadline</th>
                            <th data-hide="phone" >Bahan</th>
                            <th data-hide="phone" >Estimasi</th>
                            <th data-hide="phone" >Qty</th>
								</tr>
				</thead>
				<tbody>
                        @forelse($data as $index => $datas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>'{{ $datas->orderkerja->order }}</td>
                            <td>{{ $datas->orderkerja->pelanggan->nama }}</td>
                            <td>{!! $datas->keterangan_sub !!}</td>
                            <td>{{ Helper::tanggalId($datas->deadline) }}</td>
                            <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                            <td>{{ number_format($datas->harga) }}</td>
                            <td>{{ $datas->qty }}</td>
                        </tr>
                        @empty
                        @endforelse
				</tbody>
				<tfoot>

				</tfoot>
    </table>
</body>

</html>