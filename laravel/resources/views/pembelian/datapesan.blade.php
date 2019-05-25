<!-- Start Panel -->
<div class="col-md-8">
	@if(Session::has('alert-tmp-beli'))
	<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-tmp-beli') }}</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-title"> Daftar Barang </div>
		<ul class="panel-tools">
             <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
             <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
             <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
         </ul>
		<div class="panel-body table-responsive">
			<table class="table display">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th width="120">Harga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse($tmpb as $index => $datas)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>{{ $datas->barang->nm_barang }}</td>
						<td>{{ $datas->qty }}</td>
						<td>{{ $datas->harga }}</td>
						<td>
							<form action="{{ route('tmpbeli.destroy', $datas->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus Barang Dari Daftar ?')"><i class="fa fa-trash-o"></i></button>
							</form>
						</td>
					</tr>
					@empty
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3" align="right">Total Harga : </td>
						<td>{{ $tot }}</td>
						<td></td>
					</tr>
					<tr>
						<form action="{{ route('pembelian.store') }}" method="post">
						{{ csrf_field() }}
						<td colspan="2" align="right">Bayar :</td>
						<td colspan="2"><input type="number" class="form-control" min="1" name="bayar" required></td>
						<td>
							<button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
						</td>
						</form>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<!-- End Panel -->