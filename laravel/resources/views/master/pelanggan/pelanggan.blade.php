@extends('layout.layout')
@section('title', 'Data Costumer')
@section('content')
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Costumer</a>
					<br>
					<br>
					<div class="panel-title"> Data Costumer </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Costumer</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No. Telp/HP</th>
									<th>Email</th>
									<th>Tipe Member</th>
									<th>Pesanan Outdoor</th>
									<th>Pesanan Indoor</th>
									<th>Pesanan Print A3</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								@php($id_pelanggan = $datas->id)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ sprintf("%06s", $datas->id) }}</td>
									<td>{{ $datas->nama }}</td>
									<td>{{ $datas->alamat }}</td>
									<td>{{ $datas->no_telp }}</td>
									<td>{{ $datas->email }}</td>
									<td>{{ $datas->member->nm_tipe }}</td>
									<td>{{ Helper::totalOutdoor($id_pelanggan) }} kali</td>
									<td>{{ Helper::totalIndoor($id_pelanggan) }} kali</td>
									<td>{{ Helper::totalPrint($id_pelanggan) }} kali</td>
									<td>
										<form action="{{ route('pelanggan.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										</form>
										<a href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
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
		@include('master.pelanggan.modal')
		@include('master.pelanggan.edit')
@endsection