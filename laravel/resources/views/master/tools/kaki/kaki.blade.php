@extends('layout.layout')
@section('title', 'Data Kaki')
@section('content')

		<div class="row"> 
			<div class="col-md-12">
				@if ( session()->has('alert-success') )
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ session()->get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Kaki</a>
					<br>
					<br>
					<div class="panel-title"> Data kaki </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Tipe Kaki</th>
									<th>Tipe Member</th>
									<th>Nama Kaki</th>
									<th>Harga Tambahan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->tipe_produk }}</td>
									<td>{{ $datas->member->nm_tipe }}</td>
									<td>{{ $datas->nama_kaki }}</td>
									<td>{{ number_format($datas->tambahan_harga) }}</td>
									<td>
										<form action="{{ route('kaki.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
										<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
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

	@include('master.tools.kaki.modal')
	@include('master.tools.kaki.edit')
@endsection