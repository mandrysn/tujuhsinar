			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-printer'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-printer') }}</div>
				@endif
				<div class="panel panel-default">
					<a href="{{ route('printer.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data</a>
					<br>
					<br>
					<div class="panel-title"> Data Printer </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Printer</th>
									<th>Nama Printer</th>
									<th>Keterangan</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($printer as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->kd_printer }}</td>
									<td>{{ $datas->nm_printer }}</td>
									<td>{{ $datas->keterangan }}</td>
									<td>{{ $datas->status }}</td>
									<td>
										<form action="{{ route('printer.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										<a href="{{ route('printer.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
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