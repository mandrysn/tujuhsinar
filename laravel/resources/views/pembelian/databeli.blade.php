<!-- Start Panel -->
<div class="col-md-12">
	@if(Session::has('alert-pembelian'))
		<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-pembelian') }}</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-title"> Data Pembelian </div>
		<div class="panel-body table-responsive">
			<table id="example0" class="table display">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Data Barang</th>
						<th>Total Harga</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse($beli as $index => $datas)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>{{ $datas->tgl_pembelian }}</td>
						<td><a href="{{route('pembelian.show', $datas->id)}}">Lihat Barang</a></td>
						<td>{{ $datas->total_harga }}</td>
						<td>{{ $datas->status_pembayaran }}</td>
						<td>
							<form action="{{ route('pembelian.destroy', $datas->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
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