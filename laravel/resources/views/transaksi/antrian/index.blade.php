@extends('layout.layout')
@section('title', 'Data Antrian')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-title"> Data Antrian </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>Kode</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $datas)
								<tr>
									<td>{{ Helper::kodeAntrian() }}</td>
									<td>
										<form action="{{ route('antrian.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="{{ route('antrian.konfirmasi', $datas->id) }}" class="btn btn-success"><i class="fa fa-check"></i>Konfirmasi</a>
										<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-remove"></i>Hapus</button>
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