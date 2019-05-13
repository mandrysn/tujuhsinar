@extends('layout.layout')
@section('title', 'Data Supplier')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('supplier.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Supplier</a>
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
										<a href="{{ route('supplier.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
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
		<!-- End Row --> 
	</div>
@endsection