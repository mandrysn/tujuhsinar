<form method="post" action="{{ route('storeIndoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '0', ['id' => 'harga_indoor']) }}
	{{ Form::hidden('diskon', '0', ['id' => 'diskon_indoor']) }}
	{{ Form::hidden('produk_id', '2', ['id' => 'produk_indoor']) }}
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
				<div class="input-group">
					<span class="input-group-btn">
					<button class="btn btn-default tombol-pilih" data-produk="indoor" type="button" data-toggle="modal" data-target="#pilih-pelanggan" >Pilih</button>
					</span>
					<input type="text" class="form-control" id="detail-pelanggan-indoor" disabled="" readonly="">
					<input type="hidden" class="form-control" id="pelanggan_indoor" name="pelanggan_id" >
				</div>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Tanggal Deadline</label>
				<input type="date" class="form-control" id="pilih_deadline_indoor" style="display: inline-block;" name="deadline_indoor" required>
			</div>
		</div>  
	</div>

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
		
		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="" class="form-label">Finishing</label>
				<select class="form-control selectpicker" multiple="multiple" name="editor_id[]" id="editor_indoor">
					<option disabled >-- Pilih Finishing --</option>
					{{-- @foreach($editors as $editor)
						@if($editor->produk_id == 2)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
					
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="" class="form-label">Kaki</label>
				<select class="form-control" name="kaki_id" id="kaki_indoor">
					<option disabled selected>-- Pilih Kaki --</option>
					
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-1">
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
	
	<div class="modal fade " id="pcs-indoor" >
	    <div class="modal-dialog modal-lg" style="z-index:999;">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" >Data Pcs Finishing</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="row">
	                <div class="col-md-12 col-lg-12">
	                    
	                        <div class="col-md-12 col-lg-12" id="list-pcs2">
	                            
	                        </div>
	                        
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</form>

@push('style')
<script type="text/javascript">
	var cur_select = 0;
	var total_finishing = 0;
	var total_harga = 0;
	var total_kaki = 0;
	
	jQuery('#kaki_indoor').on('change', function(e){
		
		total_kaki = parseInt(jQuery(this).children(':selected').data('harga'));
		jQuery("#total_indoor").val(total_harga + total_kaki + total_finishing);
	


	});
	var list_pcs = [];
	jQuery(document).on('change','.jumlah_pcs', function(e){
			total_finishing = 0;
			var pcsnya = jQuery('.jumlah_pcs');
		  	jQuery(pcsnya).each(function(){
				total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
			});
		  	jQuery("#total_indoor").val(total_harga + total_finishing + total_kaki);
		  
	});
	jQuery('#editor_indoor').on('change', function(e){
			
		
		jQuery("#list-pcs2").html('');
		total_finishing = 0;
		var pcsnya = jQuery('.jumlah_pcs');
		jQuery(pcsnya).each(function(){
			total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
		});
		var opts = jQuery(this).find('option');
		jQuery(opts).each(function(){
				
			if(jQuery(this).data('type') == 3 && jQuery(this).is(':selected') && jQuery(this).val() != cur_select){
				jQuery("#list-pcs2").append("<div class='form-group'>"+
						"<label for='input1' class='form-label'>Jumlah Pcs Untuk Finishing "+jQuery(this).data('nama')+": </label>"+
						"<input type='hidden' id='input2' name='id_pcs[]' class='form-control id_pcs' value='"+jQuery(this).attr('value')+"'  >"+
						"<input type='number' id='input1' name='jumlah_pcs[]' data-harga='"+jQuery(this).data('harga')+"' class='form-control jumlah_pcs' value='1' required >"+
						"</div>");
				// console.log(jQuery(jQuery(this).attr('data-target')).hasClass('in'));
				if(jQuery(jQuery(this).attr('data-target')).hasClass('in') == false){
					
					jQuery(jQuery(this).attr('data-target')).modal('show');
				}
				
				
			}
			if(jQuery(this).is(':selected')){
				total_finishing += parseInt(jQuery(this).data('harga'));
			}
			cur_select = jQuery(this).val();
		});
		
		jQuery("#total_indoor").val(total_harga + total_finishing + total_kaki);
		
		
	});
   
	
</script>

<script type="text/javascript">

    function get_indoor() {
			var pelanggan_indoor = document.getElementById("pelanggan_indoor").value;
  		var barang_indoor = document.getElementById("barang_indoor").value;
			var p_indoor = document.getElementById("panjang_indoor").value;
			var qty_indoor = document.getElementById("qty_indoor").value;
			var l_indoor = document.getElementById("lebar_indoor").value;

			if( pelanggan_indoor != '' && barang_indoor != '' && qty_indoor != '' && l_indoor != '' && p_indoor != '' && pelanggan_indoor != null && barang_indoor != null && qty_indoor != null && l_indoor != null && p_indoor != null){

				jQuery.ajax({
							
							url: "{{ url('admin/transaksi/order/indoor/data/') }}/"+barang_indoor+"/"+pelanggan_indoor+"/"+qty_indoor+"/"+p_indoor+"/"+l_indoor,
								type: "GET",
								success: function(data) {
										jQuery('#diskon_indoor').val(data.diskon);
										total_harga = data.total;

	                					jQuery("#total_indoor").val(total_harga + total_finishing + total_kaki);

										jQuery('#harga_indoor').val(data.harga);
										console.log("{{ url('admin/transaksi/order/indoor/data/') }}/"+barang_indoor+"/"+pelanggan_indoor+"/"+qty_indoor+"/"+p_indoor+"/"+l_indoor);
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