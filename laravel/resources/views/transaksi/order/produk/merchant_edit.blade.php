<form method="post" action="{{ route('storeMerchant') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('produk_id', '3', ['id' => 'merchant_produk']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
	{{ Form::hidden('diskon', '', ['id' => 'merchant_diskon']) }}
	{{ Form::hidden('harga', '', ['id' => 'merchant_harga']) }}
    {{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'merchant_pelanggan', 'oninput' => 'get_display()']) }}
	<div class="row">
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="selectpicker form-control" name="barang_id" data-live-search="true" id="merchant_barang" onchange="get_display()" required="">
					<option selected>-- Pilih Produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 3)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="pilih_merchant"> Deadline </label>
				<input type="date" class="form-control" id="pilih_deadline_merchant" style="display: inline-block;" name="deadline" required>
			</div>
		</div>  
		
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
		</div>
	</div>

	<div class="row">
		
		
		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="input6" class="form-label">Qty</label>
				<input type="text" class="form-control" name="qty" oninput="get_display()" id="merchant_qty" required>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-2">
			
			<div class="form-group">
				<label for="" class="form-label">Total Harga</label>
				<input type="text" class="form-control" name="total" id="merchant_total" readonly placeholder="Total" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="MSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>

	</div>


</form>
@push('style')
<script type="text/javascript">

    function get_display() {
        var merchant_pelanggan = document.getElementById("merchant_pelanggan").value;
        var merchant_produk = document.getElementById("merchant_produk").value;
        var merchant_barang = document.getElementById("merchant_barang").value;
		var merchant_qty = document.getElementById("merchant_qty").value;

        jQuery.ajax({
            url: "{{ url('admin/transaksi/order/merchant/data/') }}/"+merchant_barang+"/"+merchant_pelanggan+"/"+merchant_qty+"/"+merchant_produk,
            type: "GET",
            success: function(data) {
                jQuery('#merchant_diskon').val(data.diskon);
                jQuery('#merchant_total').val(data.total);
                jQuery('#merchant_harga').val(data.harga);
                if(data.total > 0 || data.total != '') {
					jQuery('#MSub').removeAttr('disabled');
				} else {
					jQuery('#MSub').attr('disabled', 'disabled');
				}
            }
		});
		
		
        
    }
</script>
@endpush