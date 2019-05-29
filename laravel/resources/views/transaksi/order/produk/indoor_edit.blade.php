<form method="post" action="{{ route('storeIndoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'harga_indoor']) }}
	{{ Form::hidden('diskon', '', ['id' => 'diskon_indoor']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
	{{ Form::hidden('produk_id', '2', ['id' => 'produk_indoor']) }}
	{{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'pelanggan_indoor', 'oninput' => 'get_indoor()']) }}
	{{ Form::hidden('member_id', $order->pelanggan->member_id, ['id' => 'p_indoor']) }}
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
				<select class="form-control selectpicker" multiple="multiple" name="editor_id[]" id="editor_indoor">
					<option disabled>-- Pilih Finishing --</option>
					{{-- @foreach($editors as $editor)
						@if($editor->produk_id == 2)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Kaki</label>
				<select class="form-control" name="kaki_id" id="kaki_indoor">
					<option disabled>-- Pilih Kaki --</option>
					{{-- @foreach($kakis as $kaki)
						@if($kaki->produk_id == 2)
							<option value="{{ $kaki->id }}">{{ $kaki->nama_kaki }} - {{ number_format($kaki->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
		</div>
	</div>

	<div class="row">

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
	<div class="modal fade bs-example" id="pcs2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		var id = document.getElementById("p_indoor").value;
		var cur_select = 0;
		var total_finishing = 0;
		var total_harga = 0;
		jQuery('#editor_indoor').on('change', function(e){
				total_finishing = 0;
				jQuery("#pcsnya").html('');

			 
			  	jQuery("#list-pcs2").html('');
			 
			  	var opts = jQuery(this).find('option');
			  	jQuery(opts).each(function(){
			  		
						if(jQuery(this).data('type') == 3 && jQuery(this).is(':selected') && jQuery(this).val() != cur_select){
							jQuery("#list-pcs2").append("<div class='form-group'>"+
	                                "<label for='input1' class='form-label'>Jumlah Pcs Untuk Finishing "+jQuery(this).data('nama')+": </label>"+
	                                "<input type='hidden' id='input2' name='id_pcs[]' class='form-control id_pcs' value='"+jQuery(this).attr('value')+"'  >"+
	                                "<input type='number' id='input1' name='jumlah_pcs[]' class='form-control jumlah_pcs' value='0' required >"+
	                            	"</div>");
							console.log(jQuery(jQuery(this).attr('data-target')).hasClass('in'));
							if(jQuery(jQuery(this).attr('data-target')).hasClass('in') == false){
								jQuery(jQuery(this).attr('data-target')).modal('show');
							}
							
							
						}
						if(jQuery(this).is(':selected')){
							total_finishing += parseInt(jQuery(this).data('harga'));
						}
						jQuery("#total").val(total_harga + total_finishing);
						cur_select = jQuery(this).val();
						
				});
			  	
			  	
			  
			  
			});
		$.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/indoor/kaki') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				console.log(data)
				$('.indoorKaki').remove();
				var tablaDatos = $('#kaki_indoor');
				
					$(data).each(function(key,value){
					    tablaDatos.append("<option class='indoorKaki' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_kaki+" - ["+value.tambahan_harga+"]</option>");
					});
				
			}
		})

		$.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/indoor/finishing') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				console.log(data)
				$('.editorIndoor').remove();
				var tablaDatos = $('#editor_indoor');
				
					$(data).each(function(key,value){
					    tablaDatos.append("<option class='editorIndoor'  data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-target='#pcs2' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>");
					});
				
			}
		})
	
</script>
<script type="text/javascript">

    function get_indoor() {
			var pelanggan_indoor = document.getElementById("pelanggan_indoor").value;
    	var produk_indoor = document.getElementById("produk_indoor").value;
  		var barang_indoor = document.getElementById("barang_indoor").value;
			var p_indoor = document.getElementById("panjang_indoor").value;
			var qty_indoor = document.getElementById("qty_indoor").value;
			var l_indoor = document.getElementById("lebar_indoor").value;

			if(produk_indoor != '' && pelanggan_indoor != '' && barang_indoor != '' && qty_indoor != '' && l_indoor != '' && p_indoor != '' && produk_indoor != null && pelanggan_indoor != null && barang_indoor != null && qty_indoor != null && l_indoor != null && p_indoor != null){

				jQuery.ajax({
							
							url: "{{ url('admin/transaksi/order/indoor/data/') }}/"+barang_indoor+"/"+pelanggan_indoor+"/"+qty_indoor+"/"+p_indoor+"/"+l_indoor,
								type: "GET",
								success: function(data) {
										jQuery('#diskon_indoor').val(data.diskon);
										total_harga = data.total;
	                jQuery("#total").val(total_harga + total_finishing);
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