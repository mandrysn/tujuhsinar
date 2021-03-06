@extends('layout.layout')
@section('title', 'Data Supplier')
@section('content')
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Supplier</a>
					<br>
					<br>
					<div class="panel-title"> Data Supplier </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Alamat</th>
									<th>No. Telp/Hp</th>
									<th>Email</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->nm_lengkap }}</td>
									<td>{{ $datas->alamat }}</td>
									<td>{{ $datas->no_telp }}</td>
									<td>{{ $datas->email }}</td>
									<td>{{ $datas->keterangan }}</td>
									<td>
										<form action="{{ route('supplier.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										</form>
										<button href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</button>
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
	@include('master.supplier.modal')
	@include('master.supplier.edit')
@endsection