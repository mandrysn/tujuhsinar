@extends('layout.layout');
@section('title', 'Data Order');
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-title"> Data Ambil Barang </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>Order</th>
									<th>Tanggal</th>
									<th>Pukul</th>
									<th>Deadline</th>
									<th>CS</th>
									<th>Customer</th>
									<th>Nama File</th>
									<th>Nama Pekerjaan</th>
									<th>Ukuran</th>
									<th>Qty</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@forelse($data as $datas)
								<tr>
									<td>{{ $datas->id }}</td>
									<td>{{ $datas->order_kerja->tanggal->format('d-m-Y') }}</td>
									<td>{{ $datas->order_kerja->tanggal->format('H:i') }}</td>
									<td>{{ $datas->order_kerja->deadline->format('d-m-Y') }}</td>
									<td>{{ Auth::user()->nama }}</td>
									<td>{{ $datas->order_kerja->pelanggan->nama }}</td>
									<td>{{ $datas->file }}</td>
									<td>{{ $datas->pekerjaan->nm_pekerjaan }}</td>
									<td>{{ $datas->panjang }} x {{ $datas->lebar }}</td>
									<td>{{ $datas->qty }}</td>
									<td>
										<a href="{{ route('ambilbarang.edit', $datas->id) }}" class="btn btn-success"><i class="fa fa-check"></i>Verifikasi</a>
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
		<!-- End Row --> 
	</div>
@endsection