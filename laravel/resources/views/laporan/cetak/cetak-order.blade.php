<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=rekap-data-order.xls");
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
									<th>No.</th>
                                    <th>Order</th>
                                    <th>Member</th>
									<th>Pelanggan</th>
									<th>Tanggal Order</th>
                                    <th>Pembayaran</th>
                                    <th>Keterangan</th>
								</tr>
				</thead>
				<tbody>
                        @forelse($data as $index => $datas)
                        <tr id="order-{{ $datas->id }}" class="listnya">
                            <td>{{ $index + 1 }}</td>
                            <td>'{{ $datas->order }}</td>
                            <td>{{ $datas->pelanggan->member->nm_tipe }}</td>
                            <td>{{ $datas->pelanggan->nama }}</td>
                            <td>{{ Helper::tanggalId($datas->tanggal) }}</td>
                            <td>{{ $datas->status_payment }}</td>
                            <td>{!! trim($datas->keterangan) !!}</td>
                        </tr>
                        @empty
                        @endforelse
				</tbody>
				<tfoot>

				</tfoot>
    </table>
</body>

</html>