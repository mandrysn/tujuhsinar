<form method="post" action="{{ route('storeIndoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'harga_indoor']) }}
	{{ Form::hidden('diskon', '', ['id' => 'diskon_indoor']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
	{{ Form::hidden('produk_id', '2', ['id' => 'produk_indoor']) }}
	{{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'pelanggan_indoor', 'oninput' => 'get_indoor()']) }}
	<div class="row">
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="selectpicker form-control" name="barang_id" data-live-search="true" onchange="get_indoor()" id="barang_indoor" required>
					<option disable>-- Pilih Produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 2)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="inputp" class="form-label">Panjang (Meter)</label>
				<input type="number" class="form-control" id="panjang_indoor" oninput="get_indoor()" value="0.00" min="0" name="panjang" step="0.01" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="inputl" class="form-label">Lebar (Meter)</label>
				<input type="number" class="form-control" id="lebar_indoor" oninput="get_indoor()" value="0.00" min="0" name="lebar" step="0.01" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Nama File</label>
				<input type="text" name="nama_file" class="form-control" required>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Tanggal Deadline</label>
				<input type="date" class="form-control" style="display: inline-block;" name="deadline_indoor" required>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Finishing</label>
				<select class="form-control" name="editor_id" id="editor_indoor">
					<option selected>-- Pilih Finishing --</option>
					@foreach($editors as $editor)
						@if($editor->produk_id == 2)
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
					<option selected>-- Pilih Kaki --</option>
					@foreach($kakis as $kaki)
						@if($kaki->produk_id == 2)
							<option value="{{ $kaki->id }}">{{ $kaki->nama_kaki }} - {{ number_format($kaki->tambahan_harga) }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-4" >
			<div class="form-group">
				<label for="input4" class="form-label">Tipe Print</label>
				<select class="form-control" oninput="get_indoor()" name="tipe_print" id="tipe_print" required>
					<option selected>--Pilih Tipe--</option>
					<option value="1">Print Only</option>
					<option value="2">Cut Only</option>
					<option value="3">Print + Cut</option>
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="input6" class="form-label">Qty</label>
				<input type="text" class="form-control" name="qty" oninput="get_indoor()" id="qty_indoor" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-2">	
			<div class="form-group">
				<label for="" class="form-label">Total Harga</label>
				<input type="text" class="form-control" name="total" id="total_indoor" readonly placeholder="Total" required>
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

    function get_indoor() {
			var pelanggan_indoor = document.getElementById("pelanggan_indoor").value;
    	var produk_indoor = document.getElementById("produk_indoor").value;
  		var barang_indoor = document.getElementById("barang_indoor").value;
  		var editor_indoor = document.getElementById("editor_indoor").value;
			var p_indoor = document.getElementById("panjang_indoor").value;
			var qty_indoor = document.getElementById("qty_indoor").value;
			var l_indoor = document.getElementById("lebar_indoor").value;
			var tipe_print = document.getElementById("tipe_print").value;

			if(produk_indoor != '' && pelanggan_indoor != '' && barang_indoor != '' && editor_indoor != '' && qty_indoor != '' && l_indoor != '' && p_indoor != '' && produk_indoor != null && pelanggan_indoor != null && barang_indoor != null && editor_indoor != null && qty_indoor != null && l_indoor != null && p_indoor != null){

				jQuery.ajax({
							
							url: "{{ url('admin/transaksi/order/indoor/data/') }}/"+barang_indoor+"/"+pelanggan_indoor+"/"+qty_indoor+"/"+p_indoor+"/"+l_indoor+"/"+tipe_print,
								type: "GET",
								success: function(data) {
										jQuery('#diskon_indoor').val(data.diskon);
										jQuery('#total_indoor').val(data.total);
										jQuery('#harga_indoor').val(data.harga);
										if(data.total > 0 || data.total != '') {
								jQuery('#ISub').removeAttr('disabled');
							} else {
								jQuery('#ISub').attr('disabled', 'disabled');
							}
								}
				});
				

			}
   
    }
</script>
@endpush