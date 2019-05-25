@extends('layout.layout')
@section('title', 'Tambah Jenis Kaki')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Jenis Kaki
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('kaki.store') }}">
        			{!! csrf_field() !!}
                    <div class="form-group">
                        <label for="input1" class="form-label">nama kaki</label>
                        <input type="text" class="form-control" name="nama_kaki" id="input1" required>
                    </div>
        			<div class="form-group">
        				<label for="input2" class="form-label">Harga Tambahan</label>
        				<input type="text" class="form-control" name="tambahan_harga" id="input2" required>
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
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection