@extends('layout.layout');
@section('title', 'Data Editor');
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('editor.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data</a>
					<br>
					<br>
					<div class="panel-title"> Data Editor </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Editor</th>
									<th>Jenis Kelaman</th>
									<th>Alamat</th>
									<th>Nomor Telpon</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@foreach($data as $datas)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $datas->nama }}</td>
									@if($datas->jk == 'l')
									<td>Laki-laki</td>
									@else
									<td>Perempuan</td>
									@endif
									<td>{{ $datas->alamat }}</td>
									<td>{{ $datas->no_hp }}</td>
									<td>
										<form action="{{ route('editor.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="{{ route('editor.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
										<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
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