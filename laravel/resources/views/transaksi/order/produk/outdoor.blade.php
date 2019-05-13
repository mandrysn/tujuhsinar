<form method="post" action="{{ route('storeOutdoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'harga']) }}
	{{ Form::hidden('diskon', '', ['id' => 'diskon']) }}
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
				<select class="selectpicker form-control" data-live-search="true" name="pelanggan_id" id="pelanggan" onchange="get_card_name()" required>
					<option disable>-- Pilih Member --</option>
					@foreach($members as $member)
					<option value="{{ $member->id }}">{{ sprintf("%06s", $member->id) }} - {{ $member->nama }} [{{ $member->member->nm_tipe }}] - {{ $member->no_telp }}</option>
					@endforeach
				</select>
			</div>

		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Tanggal Deadline</label>
				<input type="date" class="form-control" id="pilih_deadline_outdoor" style="display: inline-block;" name="deadline" required>
			</div>
		</div>  
	</div>

	<div class="row">

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="selectpicker form-control" name="barang_id" data-live-search="true" onchange="get_card_name()" id="barang" required>
					<option disable>-- Pilih Produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 1)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="inputp" class="form-label">Panjang (Meter)</label>
				<input type="number" class="form-control" id="panjang" oninput="get_card_name()" value="0.00" min="0" name="panjang" step="0.01" required>
			</div>
		</div>
		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="inputl" class="form-label">Lebar (Meter)</label>
				<input type="number" class="form-control" id="lebar" oninput="get_card_name()" value="0.00" min="0" name="lebar" step="0.01" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Nama File</label>
				<input type="text" name="nama_file" class="form-control" required>
			</div>
		</div>
	{{-- <div class="col-md-1">
		<div class="form-group">
			<label class="form-label"></label>
			<fieldset>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend input-group" style="margin-top: -5px;">
							<div class="radio radio-danger">
                                <input type="radio" name="deadline" id="beosk_outdoor" value="besok" onclick="$('#pilih_deadline_outdoor').attr('disabled','disabled');">
                                <label for="beosk_outdoor"> Besok </label>
                            </div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>  

	<div class="col-md-1">
		<div class="form-group">
			<label class="form-label"></label>
			<fieldset>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend input-group" style="margin-top: -5px;">
							<div class="radio radio-danger">
                                <input type="radio" name="deadline" id="lusa_outdoor" value="lusa" onclick="$('#pilih_deadline_outdoor').attr('disabled','disabled');">
                                <label for="lusa_outdoor"> Lusa </label>
                            </div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>  --}}
	</div>

	<div class="row">
	
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Finishing</label>
				<select class="form-control" name="editor_id" id="editor_id">
					<option value="" selected>-- Pilih Finishing --</option>
					@foreach($editors as $editor)
						@if($editor->produk_id == 1)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Kaki</label>
				<select class="form-control" name="kaki_id" id="kaki_id">
					<option value="" selected>-- Pilih Kaki --</option>
					@foreach($kakis as $kaki)
						@if($kaki->produk_id == 1)
							<option value="{{ $kaki->id }}">{{ $kaki->nama_kaki }} - {{ number_format($kaki->tambahan_harga) }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="input6" class="form-label">Qty</label>
				<input type="text" class="form-control" name="qty" oninput="get_card_name()" id="qty" required>
			</div>
		</div>

		
		<div class="col-md-12 col-lg-2">
			
			<div class="form-group">
				<label for="" class="form-label">Total Harga</label>
				<input type="text" class="form-control" name="total" id="total" readonly placeholder="Total" required>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-4">
			<button type="submit" class="btn btn-primary" id="OSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>
</form>

@push('style')
<script type="text/javascript">

    function get_card_name() {
		var pelanggan = document.getElementById("pelanggan").value;
  		var barang = document.getElementById("barang").value;
		var p = document.getElementById("panjang").value;
		var l = document.getElementById("lebar").value;
		var qty = document.getElementById("qty").value;

		if(pelanggan != '' && barang != '' && qty != '' && l != '' && p != '' && pelanggan != null && barang != null && qty != null && l != null && p != null) {

			jQuery.ajax({
	        	
	            url: "{{ url('admin/transaksi/order/outdoor/data/') }}/"+barang+"/"+pelanggan+"/"+qty+"/"+p+"/"+l,
	            type: "GET",
	            success: function(data) {
	                jQuery('#diskon').val(data.diskon);
	                jQuery('#total').val(data.total);
					jQuery('#harga').val(data.harga);
					
						if(data.total > 0 || data.total != '') {
							jQuery('#OSub').removeAttr('disabled');
						} else {
							jQuery('#OSub').attr('disabled', 'disabled');
						}
	            }
			});
		
		}

        
    }
</script>
@endpush