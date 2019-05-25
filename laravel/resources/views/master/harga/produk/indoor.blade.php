<form method="post" action="{{ route('harga.indoor') }}" >
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-lg-12">
			<h3>Indoor</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label for="select2" class="form-label">Tipe Member</label>
				<select class="form-control" name="member_id" required>
					<option value="">-- Pilih Member --</option>
					@foreach($member as $tampil)
					<option value="{{ $tampil->id }}">{{ $tampil->nm_tipe }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label for="input3" class="form-label">Produk</label>
				<select class="form-control" name="barang_id" id="input_fly" required="">
					<option selected>-- Pilih produk --</option>
					@foreach($barangs as $barang)
						@if($barang->produk_id == 2)
							<option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label for="input" class="form-label">keterangan</label>
				<input type="text" class="form-control" name="keterangan" id="input" required>
			</div>
		</div>


	</div>

	<div class="row">

		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label for="" class="form-label">Harga</label>
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<input type="text" class="form-control" name="harga_pokok" min="0" max="99999999" id="input_kn" placeholder="Pokok" required>
					</div>
					<div class="col-md-12 col-lg-6">
						<input type="text" class="form-control" name="harga_jual" min="0" max="99999999" id="input_kn" placeholder="Jual" required>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-1">
			<div class="form-group">
				<label for="input5" class="form-label">Diskon</label>
				<input type="text" class="form-control" name="disc" id="input_kn" min="0" value="0" placeholder="%" required>
			</div>
		</div>
	
		<div class="col-md-12 col-lg-3">
			<div class="form-group">
				<label for="" class="form-label">Range Quantity</label>
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<input type="number" class="form-control" name="range_min" min="0" id="input_kn" placeholder="Min" required>
					</div>
					<div class="col-md-12 col-lg-6">
						<input type="number" class="form-control" name="range_max" min="1" id="input_kn" placeholder="Max" required>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4" style="margin-top: 28px">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
		</div>
	</div>
</form>