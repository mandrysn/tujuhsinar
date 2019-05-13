<form method="post" action="{{ route('storeMerchant') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'merchant_harga']) }}
	{{ Form::hidden('diskon', '', ['id' => 'merchant_diskon']) }}
	{{ Form::hidden('produk_id', '3', ['id' => 'merchant_produk']) }}
	<div class="row">
		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="input2" class="form-label">No Order</label>
				<input type="text" class="form-control" name="order" required readonly value="{{ $kode }}">
			</div>
		</div> 

		<div class="col-md-12 col-lg-5">
			<div class="form-group">
				<label for="select2" class="form-label">Customer</label>
				<select class="selectpicker form-control" name="pelanggan_id" data-live-search="true" id="merchant_pelanggan" onchange="get_display()" required>
					<option disable>-- Pilih Member --</option>
					@foreach($members as $member)
					<option value="{{ $member->id }}">{{ sprintf("%06s", $member->id) }} - {{ $member->nama }} [{{ $member->member->nm_tipe }}] - {{ $member->no_telp }}</option>
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
	</div>

	<div class="row">
		
		<div class=" col-lg-4">
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
				<label class="form-label">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
		</div>
		
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

		<div class="col-md-12 col-lg-4">
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