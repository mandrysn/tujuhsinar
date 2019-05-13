@extends('layout.layout')
@section('title', 'Data Bahan')
@section('content')

		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-barang'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-barang') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Bahan</a>
					<br>
					<br>
					<div class="panel-title"> Data Costumer </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Barcode</th>
									<th>Tipe Cetak</th>
									<th>Kategori</th>
									<th>Satuan</th>
									<th>Supplier</th>
									<th>Harga Beli</th>
									<th>Min. Stok</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->barcode }}</td>
									<td>{{ $datas->tipe_produk }}</td>
									<td>{{ $datas->kategori }}</td>
									<td>{{ $datas->satuan }}</td>
									<td>{{ $datas->supplier->nm_lengkap }}</td>
									<td>{{ number_format($datas->hrg_beli) }}</td>
									<td>{{ $datas->min_stok }}</td>
									<td>
										<form action="{{ route('barang.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
										<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										</form>
									</td>
								</tr>
								@empty
								@endforelse
							<tfoot>

							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- End Panel --> 
		</div>
		<!-- End Row --> 
	@include('master.tools.barang.modal')
	@include('master.tools.barang.edit')

@endsection