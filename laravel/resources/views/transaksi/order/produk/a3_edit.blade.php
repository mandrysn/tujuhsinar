<form method="post" action="{{ route('storePrintQuarto') }}" >
	{!! csrf_field() !!}
	{{ Form::hidden('harga', '', ['id' => 'print_harga']) }}
	{{ Form::hidden('diskon', '', ['id' => 'print_diskon']) }}
	{{ Form::hidden('order', $order->order, ['id' => 'order']) }}
  {{ Form::hidden('pelanggan_id', $order->pelanggan_id, ['id' => 'print_pelanggan', 'oninput' => 'get_printer()']) }}
	{{ Form::hidden('member_id', $order->pelanggan->member_id, ['id' => 'pr_pelanggan']) }}

	<div class="row">
		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="selectpicker form-control" name="barang_id" data-live-search="true" id="print_barang" onchange="get_printer()" required >
					<option selected>-- Pilih produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 4)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Deadline</label>
<<<<<<< HEAD
				<input type="date" class="form-control" id="pilih_deadline_print" style="display: inline-block;" name="deadline">
=======
				<input type="date" class="form-control" id="pilih_deadline_print" style="display: inline-block;" name="deadline_print">
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
			</div>
		</div>  

		<div class="col-md-12 col-lg-4">
			<div class="form-group">
				<label class="form-label">Nama File</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 col-lg-2">
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
		
		<div class="col-md-12 col-lg-2" >
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
				<label for="" class="form-label">Finishing</label>
				<select class="form-control" name="editor_id" id="editor_print">
					<option disabled>-- Pilih Finishing --</option>
					{{-- @foreach($editors as $editor)
						@if($editor->produk_id == 4)
							<option value="{{ $editor->id }}">{{ $editor->nama_finishing }} - {{ number_format($editor->tambahan_harga) }}</option>
						@endif
					@endforeach --}}
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

		<div class="col-md-12 col-lg-4" style="margin-top: 28px;">
			<button type="submit" class="btn btn-primary" id="PSub" disabled>Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>

	</div>
</form>

@push('style')
<script type="text/javascript">
	var pr_pelanggan = document.getElementById("pr_pelanggan").value;
	$.ajax({
		type	 : 'get',
		url		 : "{{ url('admin/transaksi/order/print/finishing') }}",
		data	 : {id:id},
		typeData : 'json',
		success:function(data)
		{
			console.log(data)
			$('.editorPrint').remove();
			var tablaDatos = $('#editor_print');
			
				$(data).each(function(key,value){
						tablaDatos.append("<option class='editorPrint' data-pid='"+value.id+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>");
				});
			
		}
	})

</script>
<script type="text/javascript">
    function get_printer() {
			var print_pelanggan = document.getElementById("print_pelanggan").value;
			var tipe_print = document.getElementById("pilih_tipe_print").value;
			var print_barang = document.getElementById("print_barang").value;
			var print_qty = document.getElementById("print_qty").value;
			var ukuran = document.getElementById("ukuran_print_a3").value;
		
			if (print_pelanggan != '' && print_barang != '' && print_qty != '' && tipe_print != '' && ukuran != '' && print_pelanggan != null && print_barang != null && print_qty != null && tipe_print != null && ukuran != null ) {
				jQuery.ajax({
					url: "{{ url('admin/transaksi/order/print/data/') }}/"+print_barang+"/"+print_pelanggan+"/"+print_qty+"/"+ukuran+"/"+tipe_print,
					type: "GET",
					success: function(data) {
							jQuery('#print_diskon').val(data.diskon);
							jQuery('#print_harga').val(data.harga);
							jQuery('#print_total').val(data.total);
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