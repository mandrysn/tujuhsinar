@extends('layout.layout')
@section('title', 'Data Piutang')
@section('content')

<div class="row"> 
    <!-- Start Panel -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Data Piutang </div>
            <div class="panel-body table-responsive">
				
				<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
					<thead>
						<tr>
							<th data-toggle="true">Costumer</th>
							<th data-hide="phone">Deadline</th>
							<th data-hide="phone">Diskon</th>
							<th data-hide="phone">Barang</th>
							<th data-hide="phone">Total Harga</th>
							<th data-hide="phone" >Quantity</th>
							<th data-hide="all" >No. Order </th>
							<th data-hide="all" >Keterangan Order </th>
							<th data-hide="all" >Keterangan Payment </th>
							<th data-hide="all" >Produk </th>
							<th class="text-right" data-sort-ignore="true">Action</th>

						</tr>
					</thead>
					<tbody>
						@forelse($data as $index => $datas)
						<tr>
							<td>
								{{ $datas->orderkerja->pelanggan->nama }}
							</td>
							<td>
								{{ Helper::tanggalId($datas->deadline) }}
							</td>
							<td>
								{{ $datas->diskon }} %
							</td>
							<td>
								{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}
							</td>
							<td>Rp. {{ number_format($datas->total) }}</td>
							<td>
								{{ $datas->qty }}
							</td>
							<td>{{ $datas->orderkerja->order }}</td>
							<td>
								{!! $datas->keteranganSub !!}
							</td>
							<td>{!! $datas->orderkerja->keterangan !!}</td>
							<td>{{ $datas->nama_produk }}</td>
							<td class="text-right">
								<div class="btn-group">
									@if ($datas->status_produksi == '3')
									<a class="btn btn-xs btn-white" onclick="return confirm('Barang telah selesai. Apakah mau diambil ?')" href="{{ route('piutang.update_status',$datas->id) }}"><i class="fa fa-check"></i>Selesai</a>
									@elseif ($datas->status_produksi == '4')
									<a class="btn btn-xs btn-white" ><i class="fa fa-cubes"></i>Sudah di ambil</a>
									
									@endif
								</div>
							</td>
						</tr>

                        @empty
                        @endforelse

					</tbody>
					<tfoot>
						<tr>
							<td colspan="7">
								<nav aria-label="Page navigation example">
									<ul class="pagination pull-right"></ul>
								</nav>
							</td>
						</tr>
					</tfoot>
				</table>
            </div>
        </div>
    </div>
    <!-- End Panel --> 
</div>

@endsection