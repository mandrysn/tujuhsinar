@extends('layout.layout')
@section('title', 'Data Harga')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('harga.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data Harga</a>
					<br>
					<br>
					<div class="panel-title"> Data Harga </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Tipe Member</th>
									<th>Keterangan Member</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $harga)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $harga->member->nm_tipe }} {{ $harga->nama_produk }} </td>
									<td>{{ $harga->keterangan }}</td>
									<td>
										<form action="{{ route('harga.destroy', $harga->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="{{ route('harga.show', $harga->id) }}" class="btn btn-option1"><i class="fa fa-ioxhost"></i>Detail</a>
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