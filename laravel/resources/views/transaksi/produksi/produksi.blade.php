@extends('layout.layout')
@section('title', 'Data Produksi')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-title"> Data Produksi </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Jenis Order</th>
									<th>Total Order</th>
									<th>Antrian</th>
									<th>Printing</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->nama_produk }}</td>
									<td>{{ $datas->produk }}</td>
									<td>{{ Helper::totalAntrian($datas->produk_id) }}</td>
									<td>{{ Helper::totalPrinting($datas->produk_id) }}</td>
									<td>						
										<a href="{{ route('produksi.show', strtolower($datas->nama_produk)) }}" class="btn btn-option2"><i class="fa fa-info"></i>Detail</a>

										@if ($datas->status_produksi == '1')
										<a href="{{ route('produksi.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-check"></i> Order</a>
										@elseif ($datas->status_produksi == '2')
										<a href="{{ route('produksi.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-stack-overflow"></i> Selesai</a>
										@elseif ($datas->status_produksi == '3')
										<a class="btn btn-option3"><i class="fa fa-cubes"></i> Selesai</a>
										@endif
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