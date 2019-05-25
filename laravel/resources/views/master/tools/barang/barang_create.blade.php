@extends('layout.layout')
@section('title', 'Tambah Barang')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Barang
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('barang.store') }}">
        			{!! csrf_field() !!}
        			<div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
        				<label for="input2" class="form-label">Barcode</label>
        				<input type="text" class="form-control" name="barcode" id="input2" required>
                    </div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Tipe Cetak</label>
                        <select class="form-control" name="produk_id" required>
                            <option>-- Pilih Tipe Cetak --</option>
                            <option value="1">Outdoor</option>
                            <option value="2">Indoor</option>
                            <option value="3">Merchant</option>
                            <option value="4">Print A3</option>
                            <option value="5">Costum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nm_barang" id="input3" required>
                    </div>
        			<div class="form-group">
        				<label for="input4" class="form-label">Kategori</label>
        				<input type="text" class="form-control" name="kategori" id="input4" required>
        			</div>
                    <div class="form-group">
                        <label for="input5" class="form-label">Satuan</label>
                        <input type="text" class="form-control" name="satuan" id="input5" required>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control" name="hrg_beli" id="input6" value="0" required>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="form-label">Minimal Stok</label>
                        <input type="text" class="form-control" name="min_stok" id="input6" value="0" required>
                    </div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Supplier</label>
                        <select class="form-control" name="supplier_id" required="">
                            <option value="">-- Pilih Member --</option>
                            @foreach($supplier as $tampil)
                            <option value="{{ $tampil->id }}">{{ $tampil->nm_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection