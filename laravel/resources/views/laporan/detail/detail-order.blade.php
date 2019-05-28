@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-title">
						<form class="form-horizontal"  method="post" action="{{ route('laporan.cetak.order') }}">
							{!! csrf_field() !!}
							<input type="hidden" name="tanggal" value="{{ $tanggal }}" />
							<input type="hidden" name="jam" value="{{ implode(' - ',$jam) }}" />
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                    <a href="{{ route('laporan.transaksi') }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
                                </div>
                        </form>
					</div>
					<div class="panel-body table-responsive">
    
						<table id="example0" class="table display">
				<thead>
					<tr>
									<th>No.</th>
                                    <th>Order</th>
                                    <th>Member</th>
									<th>Pelanggan</th>
									<th>Tanggal Order</th>
                                    <th>Pembayaran</th>
                                    <th>Keterangan</th>
								</tr>
				</thead>
				<tbody>
                        @forelse($data as $index => $datas)
                        <tr id="order-{{ $datas->id }}" class="listnya">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $datas->order }}</td>
                            <td>{{ $datas->pelanggan->member->nm_tipe }}</td>
                            <td>{{ $datas->pelanggan->nama }}</td>
                            <td>{{ Helper::tanggalId($datas->tanggal) }}</td>
                            <td>{{ $datas->status_payment }}</td>
                            <td>{!! trim($datas->keterangan) !!}</td>
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