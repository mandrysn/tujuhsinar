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
				<select class="form-control" data-live-search="true" name="pelanggan_id" id="pelanggan"  onchange="get_card_name()" required>
					<option disable>-- Pilih Member --</option>
					@foreach($members as $member)
					<option value="{{ $member->id }}" data-pid="{{ $member->member_id }}">{{ sprintf("%06s", $member->id) }} - {{ $member->nama }} [{{ $member->member->nm_tipe }}] - {{ $member->no_telp }}</option>
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
				<label for="input3" class="form-label">Format Ukuran</label>
				<select class="selectpicker form-control" name="format_ukuran" data-live-search="true" onchange="get_card_name()" id="format_ukuran">
					<option selected>-- Pilih Format --</option>
					<option value="4">Tanpa dibulatkan</option>
					<option value="1">Bulatkan Panjang</option>
					<option value="2">Bulatkan Lebar</option>
					<option value="3">Bulatkan Panjang & Lebar</option>
				</select>
			</div>
		</div>
	
	</div>

	<div class="row">
	
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Finishing</label>
				<select class="form-control selectpicker" multiple="multiple" name="editor_id[]" id="editor_outdoor">
					<option disabled>-- Pilih Finishing --</option>
					{{-- @foreach($editors as $editor)
						@if($editor->produk_id == 1)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="" class="form-label">Kaki</label>
				<select class="form-control" name="kaki_id" id="kaki_outdoor">
					<option disabled>-- Pilih Kaki --</option>
					{{-- @foreach($kakis as $kaki)
						@if($kaki->produk_id == 1)
							<option value="{{ $kaki->id }}">{{ $kaki->nama_kaki }} - {{ number_format($kaki->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
				</select>
			</div>
			<div id="pcsnya" style="display: none;">
				
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Nama File</label>
				<input type="text" name="nama_file" class="form-control" required>
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
		
		
		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="OSub" disabled >Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>

	<div class="modal fade bs-example" id="pcs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	jQuery('#editor_outdoor').on('change', function(e){
			
			jQuery("#pcsnya").html('');

		 
		  	jQuery("#list-pcs").html('');
		 
		  	var opts = jQuery(this).find('option');
		  	jQuery(opts).each(function(){
		  		
					if(jQuery(this).data('type') == 3 && jQuery(this).is(':selected') && jQuery(this).val() != cur_select){
						jQuery("#list-pcs").append("<div class='form-group'>"+
                                "<label for='input1' class='form-label'>Jumlah Pcs Untuk Finishing "+jQuery(this).data('nama')+": </label>"+
                                "<input type='hidden' id='input2' name='id_pcs[]' class='form-control id_pcs' value='"+jQuery(this).attr('value')+"'  >"+
                                "<input type='number' id='input1' name='jumlah_pcs[]' class='form-control jumlah_pcs' value='0' required >"+
                            	"</div>");
						console.log(jQuery(jQuery(this).attr('data-target')).hasClass('in'));
						if(jQuery(jQuery(this).attr('data-target')).hasClass('in') == false){
							jQuery(jQuery(this).attr('data-target')).modal('show');
						}
						
						
					}
					cur_select = jQuery(this).val();
					
			});
		  	
		  	
		  
		  
		});
    jQuery(document).on('change','#pelanggan', function(e){
		var id = jQuery(this).children(":selected").attr("data-pid");
		
		jQuery.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/outdoor/kaki') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				//console.log(data)
				jQuery('.outdoorKaki').remove();
				var tablaDatos = jQuery('#kaki_outdoor');
				
				jQuery(data).each(function(key,value){
					    tablaDatos.append("<option class='outdoorKaki' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_kaki+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
					});
				
			}
		});

		jQuery.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/transaksi/order/outdoor/finishing') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				//console.log(data)
				jQuery('.editorOutdoor').remove();
				var tablaDatos = jQuery('#editor_outdoor');
				
				jQuery(data).each(function(key,value){
						
					    tablaDatos.append("<option class='editorOutdoor' data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-target='#pcs' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
					});
				
			}
		});

	

	})
	
</script>

<script type="text/javascript">

    function get_card_name() {
		var pelanggan = document.getElementById("pelanggan").value;
  		var barang = document.getElementById("barang").value;
		var p = document.getElementById("panjang").value;
		var l = document.getElementById("lebar").value;
		var qty = document.getElementById("qty").value;
		var format_ukuran = document.getElementById("format_ukuran").value;

		if(pelanggan != '' && barang != '' && qty != '' && l != '' && p != '' && format_ukuran != '' && pelanggan != null && barang != null && qty != null && l != null && p != null && format_ukuran != null) {

			jQuery.ajax({
	        	
	            url: "{{ url('admin/transaksi/order/outdoor/data/') }}/"+barang+"/"+pelanggan+"/"+qty+"/"+p+"/"+l+"/"+format_ukuran,
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