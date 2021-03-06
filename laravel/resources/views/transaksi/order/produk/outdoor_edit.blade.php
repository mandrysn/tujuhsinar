<form method="post" action="{{ route('storeOutdoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'harga']) }}
	{{ Form::hidden('diskon', '', ['id' => 'diskon']) }}
	{{ Form::hidden('produk_id', '1', ['id' => 'produk']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
	{{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'pelanggan', 'oninput' => 'get_card_name()']) }}
	{{ Form::hidden('member_id', $order->pelanggan->member_id, ['id' => 'pelanggan_outdoor']) }}
	
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
				<input type="number" class="form-control" id="panjang" oninput="get_card_name()" value="0.00" min="0" name="panjang" step="0.01" value="0.00" required>
			</div>
		</div>
		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="inputl" class="form-label">Lebar (Meter)</label>
				<input type="number" class="form-control" id="lebar" oninput="get_card_name()" value="0.00" min="0" name="lebar" step="0.01" value="0.00" required>
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
				<label class="form-label">Tanggal Deadline</label>
				<input type="date" class="form-control" id="pilih_deadline_outdoor" style="display: inline-block;" name="deadline" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="" class="form-label">Finishing</label>
				<select class="form-control selectpicker" data-live-search="true" multiple="multiple" name="editor_id[]" id="editor_outdoor">
					<option disabled ="">-- Pilih Finishing --</option>
					{{-- @foreach($editors as $editor)
						@if($editor->produk_id == 1)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="" class="form-label">Kaki</label>
				<select class="form-control selectpicker" data-live-search="true" name="kaki_id" id="kaki_outdoor">
					<option disabled ="">-- Pilih Kaki --</option>
					{{-- @foreach($kakis as $kaki)
						@if($kaki->produk_id == 1)
							<option value="{{ $kaki->id }}">{{ $kaki->nama_kaki }} - {{ number_format($kaki->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-1">
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
		
		
		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="OSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>	
	<div class="modal fade bs-example" id="pcs-outdoor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Data Pcs Finishing</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="row">
	                <div class="col-md-12 col-lg-12">
	                    
	                        <div class="col-md-12 col-lg-12" id="list-pcs">
	                            
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
	
	jQuery('#kaki_outdoor').on('change', function(e){
		
		total_kaki = parseInt(jQuery(this).children(':selected').data('harga'));
		jQuery("#total").val(total_harga + total_kaki + total_finishing);
	


	});
	var list_pcs = [];
	jQuery(document).on('change','.jumlah_pcs', function(e){
			total_finishing = 0;
			var pcsnya = jQuery('.jumlah_pcs');
		  	jQuery(pcsnya).each(function(){
				total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
			});
		  	jQuery("#total").val(total_harga + total_finishing + total_kaki);
		  
	});
	jQuery('#editor_outdoor').on('change', function(e){
			
		jQuery("#pcsnya").html('');
		jQuery("#list-pcs").html('');
		total_finishing = 0;
		var pcsnya = jQuery('.jumlah_pcs');
		jQuery(pcsnya).each(function(){
			total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
		});
		var opts = jQuery(this).find('option');
		jQuery(opts).each(function(){
				
			if(jQuery(this).data('type') == 3 && jQuery(this).is(':selected') && jQuery(this).val() != cur_select){
				jQuery("#list-pcs").append("<div class='form-group'>"+
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
		
		jQuery("#total").val(total_harga + total_finishing + total_kaki);
		
		
	});
		var id = document.getElementById("pelanggan_outdoor").value;
		jQuery.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/outdoor/kaki') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				console.log(data)
				jQuery('.outdoorKaki').remove();
				var tablaDatos = jQuery('#kaki_outdoor');
				
				jQuery(data).each(function(key,value){
					    tablaDatos.append("<option class='outdoorKaki' data-pid='"+value.id+"' value='"+value.id+"' data-harga='"+value.tambahan_harga+"'>"+value.nama_kaki+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
					});
				
			}
		})

		jQuery.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/outdoor/finishing') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				console.log(data)
				jQuery('.editorOutdoor').remove();
				var tablaDatos = jQuery('#editor_outdoor');
				
				jQuery(data).each(function(key,value){
					    tablaDatos.append("<option class='editorOutdoor'  data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-harga='"+value.tambahan_harga+"' data-target='#pcs' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
					});
				
			}
		})
	
</script>
<script type="text/javascript">

    function get_card_name() {
		var pelanggan = document.getElementById("pelanggan").value;
  		var barang = document.getElementById("barang").value;
		var p = document.getElementById("panjang").value;
		var l = document.getElementById("lebar").value;
		var qty = document.getElementById("qty").value;
	

		if(pelanggan != '' && barang != '' && qty != '' && l != '' && p != ''  && pelanggan != null && barang != null && qty != null && l != null && p != null ) {

			jQuery.ajax({
	        	
	            url: "{{ url('admin/transaksi/order/outdoor/data/') }}/"+barang+"/"+pelanggan+"/"+qty+"/"+p+"/"+l,
	            type: "GET",
	            success: function(data) {
	                jQuery('#diskon').val(data.diskon);
	                total_harga = data.total;
	                jQuery("#total").val(total_harga + total_finishing + total_kaki);
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