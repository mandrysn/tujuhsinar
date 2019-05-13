@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
<div class="container-padding animated fadeInRight"> 
	<div class="row"> 
		<!-- Start Panel -->
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-title"> Laporan Pembelian </div>
		<div class="col-md-7">
			<form method="get" action="{{ route('lapbeli') }}" class="form-horizontal">
				<fieldset>
	                <div class="control-group">
	                    <div class="controls">
	                        <div class="input-prepend input-group">
	                            <input type="date" name="awal" id="date-picker" class="form-control" value="{{ (isset($awal)) ? $awal : date('Y-m-d') }}"/>
	                            <input type="date" name="akhir" id="date-picker" class="form-control" value="{{ (isset($akhir)) ? $akhir : date('Y-m-d') }}"/>
	                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Cari</button>
	                            <a href="{{url('admin/laporan/cetak/beli/'.$awal.'&'.$akhir)}}" target="_BLANK" class="btn btn-warning"><i class="fa fa-print"></i>Cetak</a>
	                        </div>
	                    </div>
	                </div>
	            </fieldset>
			</form>
		</div>
		<br>
		<div class="panel-body table-responsive">
			<table class="table display">
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
						<td><a href="{{route('cetdetbeli', $datas->id)}}" target="_BLANK">Cetak</a></td>
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
</div>

@endsection