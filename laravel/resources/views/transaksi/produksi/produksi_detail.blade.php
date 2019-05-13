@extends('layout.layout')
@section('title', 'Data Produksi')
@section('content')

<div class="row"> 
    <!-- Start Panel -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Data Produksi </div>
            <div class="panel-body table-responsive">
                
						<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
							<thead>
								<tr>

                                    <th data-toggle="true">No</th>
                                    <th data-hide="all">No Order</th>
									<th data-hide="phone">Costumer</th>
                                    <th data-hide="all">Keterangan</th>
                                    <th data-hide="all">Pembayaran</th>
                                    <th data-hide="phone">Deadline</th>
                                    <th data-hide="phone" >Bahan</th>
                                    <th data-hide="phone" >Estimasi</th>
                                    <th data-hide="phone" >Qty</th>
									<th class="text-right" data-sort-ignore="true">Action</th>

								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $datas->orderkerja->order }}</td>
									<td>{{ $datas->orderkerja->pelanggan->nama }}</td>
                                    <td>{!! $datas->keterangan_sub !!}</td>
                                    <td>{!! $datas->keterangan !!}</td>
                                    <td>{{ Helper::tanggalId($datas->deadline) }}</td>
                                    <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                                    <td>{{ number_format($datas->harga) }}</td>
                                    <td>{{ $datas->qty }}</td>
									<td class="text-right">
										<div class="btn-group">
											
                                            @if ($datas->status_produksi == '1')
                                            <a class="btn-white btn btn-xs" onclick="return confirm('Yakin ingin mencetak data ini ?')" href="{{ route('produksi.update_status',$datas->id) }}"><i class="fa fa-check"></i>Antrian</a>
                                            @elseif ($datas->status_produksi == '2')
                                            <a class="btn-white btn btn-xs" onclick="return confirm('Apakah produksi telah selesai ?')" href="{{ route('produksi.update_status',$datas->id) }}"><i class="fa fa-refresh"></i>Printing</a>
                                            @elseif ($datas->status_produksi == '3')
                                            <a class="btn-white btn btn-xs" ><i class="fa fa-cubes"></i>Selesai</a>
                                            
                                            @endif
										</div>
									</td>
								</tr>
								@empty
								@endforelse

							</tbody>
							<tfoot>
								<tr>
									<td colspan="10">
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