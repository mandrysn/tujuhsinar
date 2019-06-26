@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
	<div class="container-padding animated fadeInRight"> 
		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-success'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
				@endif
				<div class="panel panel-default">
					@if (Auth::user()->role == 2 || Auth::user()->role == 1)
					<a href="{{ route('order.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Order</a>
					@endif
					<a href="{{ route('order.cancel.view') }}" class="btn btn-warning"><i class="fa fa-remove"></i>Order Yang Di Cancel</a>
					<br>
					<br>
					<div class="panel-title"> Data Pembelian </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Order</th>
									<th>Pelanggan</th>
									<th>Tanggal Order</th>
									<th>Pembayaran</th>
									<th>Status Pembayaran</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="list_order">
								@forelse($data as $index => $datas)
								<tr id="order-{{ $datas->id }}" class="listnya">
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->order }}</td>
									<td>{{ $datas->pelanggan->nama }}</td>
									<td>{{ Helper::tanggalId($datas->tanggal) }}</td>
									<td>{{ $datas->status_payment == 'belum bayar' ? 'Belum bayar' : 'Piutang' }}</td>
									<td>{{ $datas->status_payment == 'invoice' ? 'Invoice' : 'Umum' }}</td>
									<td>
																	
										<form action="{{ route('order.destroy', $datas->id) }}" class="form-horizontal" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

										<a href="{{ route('order.show', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Detail</a>

										@if (Auth::user()->role == 2 || Auth::user()->role == 1)
										<button class="btn btn-danger" @if($datas->status_payment != 'belum bayar') disabled @endif onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										@endif
										</form>
										<a href="{{ route('order.cancel', $datas->id) }}" class="btn btn-option1" @if($datas->status_payment != 'belum bayar') disabled @endif onclick="return confirm('Yakin ingin membatalkan orderan ?')"><i class="fa fa-check"></i>Cancel</a>
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
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> 
	<script type="text/javascript">
		var role = <?php echo Auth::user()->role; ?>;
		
		setInterval(function() {
			console.log("test");
			jQuery.ajax({
					url: '{{ url("api/data_order") }}',
					type: 'GET',
					success:function(data){
						if(!jQuery(".listnya").length){
							jQuery("#list_order").html('');
						}
						jQuery.each(data, function(index, val) {
							if(!jQuery("#order-"+val.id).length){
								var disabled = null;
								if(val.status_payment != 'belum bayar'){
									disabled = 'disabled';
								}
								var button_delete = '<button class="btn btn-danger" '+disabled+' onclick="return confirm("Yakin ingin menghapus data ?")"><i class="fa fa-check"></i>Delete</button>';
								var button_cancel = '<a href="<?= url('admin/transaksi/order/cancel') ?>/'+val.id+'" class="btn btn-option1" '+disabled+' onclick="return confirm("Yakin ingin membatalkan orderan ?")"><i class="fa fa-check"></i>Cancel</a>';

								var tr = '<tr id="order-'+val.id+'"><td>'+(index+1)+'</td><td>'+val.order+'</td><td>'+val.pelanggan.nama+'</td><td>'+val.tanggal+'</td><td>'+val.status_payment+'</td><td><form action="<?php echo  url('order') ?>/'+val.id+'" class="form-horizontal" method="post"><?php echo  csrf_field() ?><?php echo  method_field("DELETE") ?><a href="<?php echo  url('transaksi/order') ?>/'+val.id+'" class="btn btn-option2"><i class="fa fa-info"></i>Detail</a>';
								if(role == 2 || role == 1){
									tr += button_delete;
								}
								tr += button_cancel;
								tr += '</form></td></tr>';
								jQuery("#list_order").append(tr);
							}
						});
					}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			
		},5000);
		
	</script>
@endsection