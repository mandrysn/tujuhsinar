@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-title"> Data Pembelian </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Order</th>
									<th>Pelanggan</th>
									<th>Tanggal Order</th>
									<th>Pembayaran</th>
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