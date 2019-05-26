<form method="post" action="{{ route('storeIndoor') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'harga_indoor']) }}
	{{ Form::hidden('diskon', '', ['id' => 'diskon_indoor']) }}
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
				<select class="selectpicker form-control" name="pelanggan_id" data-live-search="true" id="pelanggan_indoor" onchange="get_indoor()" required>
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
<<<<<<< HEAD
				<select class="form-control selectpicker" multiple="multiple" name="editor_id[]" id="editor_indoor">
=======
				<select class="form-control" name="editor_id" id="editor_indoor">
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
					<option disabled>-- Pilih Finishing --</option>
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
					<option disabled>-- Pilih Kaki --</option>
					
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
		
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Keterangan File</label>
				<textarea class="form-control" id="inputext" name="keterangan_file"></textarea>
			</div>
		</div>

		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="ISub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>
<<<<<<< HEAD
	<div class='modal fade bs-example' id='pcs2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	    <div class='modal-dialog modal-lg' role='document'>
	        <div class='modal-content'>
	            <div class='modal-header'>
	                <h5 class='modal-title' id='exampleModalLabel'>Data Pcs Finishing</h5>
	                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	                    <span aria-hidden='true'>&times;</span>
	                </button>
	            </div>
	            <div class='row'>
	                <div class='col-md-12 col-lg-12'>
	                    
	                        <div class='col-md-12 col-lg-12' id='list-pcs2'>
	                            
	                        </div>
	                        
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
=======

>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
</form>

@push('style')
<script type="text/javascript">
<<<<<<< HEAD
	var cur_select = 0;
	jQuery('#editor_indoor').on('change', function(e){
			
			jQuery("#pcsnya").html('');
		  if(jQuery(this).children(":selected").data('type') == 3 && cur_select != jQuery(this).children(":selected").val()){
		  	jQuery("#list-pcs2").html('');
		  	var opts = jQuery(this).find('option');
		  	jQuery(opts).each(function(){
					if(jQuery(this).data('type') == 3 ){
						jQuery("#list-pcs2").append("<div class='form-group'>"+
                                "<label for='input1' class='form-label'>Jumlah Pcs Untuk Finishing "+jQuery(this).data('nama')+": </label>"+
                                "<input type='hidden' id='input2' name='id_pcs[]' class='form-control id_pcs' value='"+jQuery(this).attr('value')+"'  >"+
                                "<input type='number' id='input1' name='jumlah_pcs[]' class='form-control jumlah_pcs' value='0' required >"+
                            	"</div>");
						
					}
					
			});
		  	jQuery(jQuery(this).children(":selected").attr('data-target')).modal('show');
		  	
		  }
		  cur_select = jQuery(this).children(":selected").val();
		});
=======
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
    $(document).on('change','#pelanggan_indoor', function(e){
		var id = $(this).children(":selected").attr("data-pid");
		
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
<<<<<<< HEAD
				jQuery('.editorIndoor').remove();
				var tablaDatos = jQuery('#editor_indoor');
				
					jQuery(data).each(function(key,value){
					    tablaDatos.append("<option class='editorIndoor' data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-target='#pcs2'  data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
=======
				$('.editorIndoor').remove();
				var tablaDatos = $('#editor_indoor');
				
					$(data).each(function(key,value){
					    tablaDatos.append("<option class='editorIndoor' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>");
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
					});
				
			}
		})
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