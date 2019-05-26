@extends('layout.layout')
@section('title', 'Edit Jenis Finishing')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Data Jenis Finishing
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('editor.update', $data->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="input1" class="form-label">Nama Finishing</label>
                        <input type="text" class="form-control" name="nama_finishing" value="{{ $data->nama_finishing }}" id="input1" required>
                    </div>
        			<div class="form-group">
        				<label for="input2" class="form-label">Harga Tambahan</label>
        				<input type="text" class="form-control" name="tambahan_harga" value="{{ $data->tambahan_harga }}" id="input2" required>
                    </div>
<<<<<<< HEAD
                     <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Tipe Cetak</label>
                            <select class="form-control" name="type" required>
                                <option>-- Pilih Tipe Cetak --</option>
                                <option value="1" {{ $data->type == 1 ? "selected" : "" }}>Hitung Meter</option>
                                <option value="2" {{ $data->type == 2 ? "selected" : "" }}>Hitung Lembar</option>
                                <option value="3" {{ $data->type == 3 ? "selected" : "" }}>Hitung Pcs</option>
                            
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Tipe Produksi</label>
                        <select class="form-control" name="produk_id" required>
                            <option>-- Pilih Tipe Produksi --</option>
=======
                    <div class="form-group">
                        <label for="select2" class="form-label">Tipe Cetak</label>
                        <select class="form-control" name="produk_id" required>
                            <option>-- Pilih Tipe Cetak --</option>
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
                            <option value="1" {{ $data->produk_id == 1 ? "selected" : "" }}>Outdoor</option>
                            <option value="2" {{ $data->produk_id == 2 ? "selected" : "" }}>Indoor</option>
                            <option value="3" {{ $data->produk_id == 3 ? "selected" : "" }}>Merchant</option>
                            <option value="4" {{ $data->produk_id == 4 ? "selected" : "" }}>Print A3</option>
                            <option value="5" {{ $data->produk_id == 5 ? "selected" : "" }}>Costum</option>
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