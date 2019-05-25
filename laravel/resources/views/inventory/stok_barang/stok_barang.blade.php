@extends('layout.layout');
@section('title', 'Data Stok Barang');
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('stokbarang.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data</a>
					<br>
					<br>
					<div class="panel-title"> Data Stok Barang </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>Pembelian</th>
									<th>Pembayaran</th>
									<th>Supplier</th>
									<th>Barang</th>
									<th>Qty</th>
									<th>Harga</th>
									<th>Total</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@forelse($data as $datas)
								<tr>
									<td>{{ $datas->tgl_pembelian }}</td>
									<td>{{ $datas->tipe_pembayaran }}</td>
									<td>{{ $datas->supplier->nm_lengkap }}</td>
									<td>{{ $datas->barang->nm_barang }}</td>
									<td>{{ $datas->qty }}</td>
									<td>Rp. {{ number_format($datas->harga) }}</td>
									<td>Rp. {{ number_format($datas->harga * $datas->qty) }}</td>
									<td>
										<form action="{{ route('pembelian.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="{{ route('pembelian.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-pencil"></i>Edit</a>
										<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-trash"></i>Delete</button>
										</form>
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