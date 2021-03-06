<form method="post" action="{{ route('storePrintQuarto') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'print_harga']) }}
	{{ Form::hidden('diskon', '', ['id' => 'print_diskon']) }}
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
					<button class="btn btn-default tombol-pilih" data-produk="print" type="button" data-toggle="modal" data-target="#pilih-pelanggan" >Pilih</button>
					</span>
					<input type="text" class="form-control" id="detail-pelanggan-print" disabled="" readonly="">
					<input type="hidden" class="form-control" id="pelanggan_print" name="pelanggan_id" >
				</div>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="pilih_print"> Deadline </label>
				<input type="date" class="form-control" id="pilih_deadline_print" style="display: inline-block;" name="deadline_print">
			</div>
		</div>  
		
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="selectpicker form-control" name="barang_id" data-live-search="true" id="print_barang" onchange="get_printer()" required >
					<option selected>-- Pilih Produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 4)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label class="form-label">Nama File</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
		</div>

		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="ukuran">Ukuran</label> </label>
				<select class=" form-control" name="pilih_ukuran"  id="ukuran_print_a3" required onchange="get_printer()">
					<option selected>-- Pilih Ukuran --</option>
					<option value="1">A4</option>
					<option value="2">F4</option>
					<option value="3">A3</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-3" >
			<div class="form-group">
				<label for="input4" class="form-label">Tipe Print</label>
				<select class="form-control" name="tipe_print" id="pilih_tipe_print" required onchange="get_printer()">
					<option selected>--Pilih Tipe--</option>
					<option value="1">1 Sisi</option>
					<option value="2">2 Sisi</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="editor_print" class="form-label">Finishing</label>
				<select class="form-control selectpicker" multiple name="editor_id[]" data-live-search="true" id="editor_print">
					<option disabled>-- Pilih Finishing --</option>
					
				</select>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-2">
			<div class="form-group">
				<label for="input6" class="form-label">Qty</label>
				<input type="text" class="form-control" name="qty" oninput="get_printer()" id="print_qty" required>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-2">
			
			<div class="form-group">
				<label for="" class="form-label">Total Harga</label>
				<input type="text" class="form-control" name="total" id="print_total" readonly placeholder="Total" required>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Keterangan File</label>
				<textarea class="form-control" id="inputext" name="keterangan_file"></textarea>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-4"  style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="PSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>
	
	<div class="modal fade " id="pcs-print" >
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
	                    
	                        <div class="col-md-12 col-lg-12" id="list-pcs3">
	                            
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
	
	jQuery('#kaki_print').on('change', function(e){
		
		total_kaki = parseInt(jQuery(this).children(':selected').data('harga'));
		jQuery("#print_total").val(total_harga + total_kaki + total_finishing);
	


	});
	var list_pcs = [];
	jQuery(document).on('change','.jumlah_pcs', function(e){
			total_finishing = 0;
			var pcsnya = jQuery('.jumlah_pcs');
		  	jQuery(pcsnya).each(function(){
				total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
			});
		  	jQuery("#print_total").val(total_harga + total_finishing + total_kaki);
		  
	});
	jQuery('#editor_print').on('change', function(e){
			
		
		jQuery("#list-pcs3").html('');
		total_finishing = 0;
		var pcsnya = jQuery('.jumlah_pcs');
		jQuery(pcsnya).each(function(){
			total_finishing += (jQuery(this).data('harga') * jQuery(this).val());
		});
		var opts = jQuery(this).find('option');
		jQuery(opts).each(function(){
				
			if(jQuery(this).data('type') == 3 && jQuery(this).is(':selected') && jQuery(this).val() != cur_select){
				jQuery("#list-pcs3").append("<div class='form-group'>"+
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
		
		jQuery("#print_total").val(total_harga + total_finishing + total_kaki);
		
		
	});
   
	
</script>
<script type="text/javascript">
    function get_printer() {
			var print_pelanggan = document.getElementById("pelanggan_print").value;
			var tipe_print = document.getElementById("pilih_tipe_print").value;
			var print_barang = document.getElementById("print_barang").value;
			var print_qty = document.getElementById("print_qty").value;
			var ukuran = document.getElementById("ukuran_print_a3").value;

			if(print_pelanggan != '' && print_barang != '' && print_qty != '' && tipe_print != '' ) {
				jQuery.ajax({
					url: "{{ url('admin/transaksi/order/print/data/') }}/"+print_barang+"/"+print_pelanggan+"/"+print_qty+"/"+ukuran+"/"+tipe_print,
					type: "GET",
					success: function(data) {
							// jQuery('#print_diskon').val(data.diskon);
							// jQuery('#print_harga').val(data.harga);
							// jQuery('#print_total').val(data.total);

							jQuery('#print_diskon').val(data.diskon);
							total_harga = data.total;
        					jQuery("#print_total").val(total_harga + total_finishing + total_kaki);
							jQuery('#print_harga').val(data.harga);
							if(data.total > 0 || data.total != '') {
								jQuery('#PSub').removeAttr('disabled');
							} else {
								jQuery('#PSub').attr('disabled', 'disabled');
							}
					}
				});
			}

    }
</script>
@endpush