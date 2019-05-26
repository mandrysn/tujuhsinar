<form method="post" action="{{ route('storeCostumProduk') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'custom_harga']) }}
	{{ Form::hidden('produk_id', '6', ['id' => 'custom_produk']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
    {{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'custom_pelanggan', 'oninput' => 'get_costum()']) }}

	<div class="row">
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="input5" class="form-label">Nama Produk</label>
				<input type="text" class="form-control" name="nama_produk" id="custom_nama_produk" placeholder="Nama Produk" onchange="get_costum()" required>
			</div>
		</div>
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Tanggal Deadline</label>
				<input type="date" class="form-control" id="pilih_deadline_costum" style="display: inline-block;" name="deadline_costum" required>
			</div>
		</div>  
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="inputext" class="form-label">Keterangan</label>
				<textarea class="form-control" id="inputext" name="keterangan"></textarea>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="input6" class="form-label">Qty</label>
				<input type="text" class="form-control" name="qty" oninput="get_costum()" id="custom_qty" required>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-2">
			
			<div class="form-group">
				<label for="" class="form-label">Total Harga</label>
				<input type="text" class="form-control" name="total" id="custom_total" readonly placeholder="Total" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="CSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>
</form>

@push('style')
<script type="text/javascript">

    function get_costum() {
        var custom_produk = document.getElementById("custom_produk").value;
		var custom_pelanggan = document.getElementById("custom_pelanggan").value;
        var custom_nama_produk = document.getElementById("custom_nama_produk").value;
		var custom_qty = document.getElementById("custom_qty").value;

        jQuery.ajax({
            url: "{{ url('admin/transaksi/order/costum/data/') }}/"+custom_nama_produk+"/"+custom_produk+"/"+custom_pelanggan+"/"+custom_qty,
            type: "GET",
            success: function(data) {
                jQuery('#custom_diskon').val(data.diskon);
                jQuery('#custom_harga').val(data.harga);
                jQuery('#custom_total').val(data.total);
                if(data.total > 0 || data.total != '') {
							jQuery('#CSub').removeAttr('disabled');
						} else {
							jQuery('#CSub').attr('disabled', 'disabled');
						}
            }
		});

		
        
    }
</script>
@endpush