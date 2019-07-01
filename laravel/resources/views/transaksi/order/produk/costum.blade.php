<form method="post" action="{{ route('storeCostumProduk') }}" >
<div id="costum_show" class="row col-md-12">
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'custom_harga']) }}
	{{ Form::hidden('produk_id', '6', ['id' => 'custom_produk']) }}
	<div class="col-md-12 col-lg-2">
		<div class="form-group">
			<label for="input2" class="form-label">No Order</label>
			<input type="text" class="form-control" name="order" required readonly value="{{ $kode }}">
		</div>
	</div> 
	<div class="col-md-12 col-lg-3">
		<div class="form-group">
			<label for="select2" class="form-label">Customer</label>
			<div class="input-group">
					<span class="input-group-btn">
					<button class="btn btn-default tombol-pilih" data-produk="costum" type="button" data-toggle="modal" data-target="#pilih-pelanggan" >Pilih</button>
					</span>
					<input type="text" class="form-control" id="detail-pelanggan-costum" disabled="" readonly="">
					<input type="hidden" class="form-control" id="pelanggan_costum" name="pelanggan_id" >
				</div>
		</div>
	</div>
	

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label class="form-label">Deadline</label>
				<input type="date" class="form-control" id="pilih_deadline_costum" style="display: inline-block;" name="deadline_costum">
			</div>
		</div>  
		
	<div class="col-md-12 col-lg-4">
		<div class="form-group">
			<label for="barang_id" class="form-label">Nama Produk</label>
			{{-- <input type="text" class="form-control" name="nama_produk" id="custom_nama_produk" placeholder="Nama Produk" onchange="get_costum()" required> --}}
			<select class="selectpicker form-control" name="barang_id" data-live-search="true" id="barang_id" onchange="get_costum()" required >
				<option selected disabled>-- Pilih Produk --</option>
				@foreach($barangs as $barang)
					@if($barang->produk_id == 5)
						<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>

	<div class="col-md-12 col-lg-2">
		<div class="form-group">
			<label for="input6" class="form-label">Qty</label>
			<input type="text" class="form-control" name="qty" oninput="get_costum()" id="custom_qty" required>
		</div>
	</div>
	
			<input type="hidden" class="form-control" name="diskon" id="custom_diskon" placeholder="%" readonly required>

	<div class="col-md-12 col-lg-2">
		
		<div class="form-group">
			<label for="" class="form-label">Total Harga</label>
			<input type="text" class="form-control" name="total" id="custom_total" readonly placeholder="Total" required>
		</div>
	</div>

	<div class="col-md-12 col-lg-4">
		<div class="form-group">
			<label for="inputext" class="form-label">Keterangan</label>
			<textarea class="form-control" id="inputext" name="keterangan"></textarea>
		</div>
	</div>

	<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
		<button type="submit" class="btn btn-primary" id="ISub" disabled>Submit</button>
		<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
	</div>

</div>
</form>

@push('style')
<script type="text/javascript">

    function get_costum() {
        var custom_produk = document.getElementById("custom_produk").value;
		var custom_pelanggan = document.getElementById("pelanggan_costum").value;
        var custom_nama_produk = document.getElementById("barang_id").value;
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