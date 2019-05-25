@extends('layout.layout')
@section('title', 'Edit Supplier')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Data Supplier
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
                @foreach($data as $tampil)
        		<form method="post" action="{{ route('supplier.update', $tampil->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
        			<div class="form-group">
        				<label for="input1" class="form-label">Nama Lengkap</label>
        				<input type="text" id="input1" name="nama" class="form-control" value="{{ $tampil->nm_lengkap }}" required>
        			</div>
        			<div class="form-group">
        				<label for="input3" class="form-label">Alamat</label>
        				<textarea class="form-control" name="alamat" required>{{ $tampil->alamat }}</textarea>
        			</div>
                    <div class="form-group">
                        <label for="input4" class="form-label">Nomor Telpon</label>
                        <input type="text" id="input4" name="no_telp" class="form-control" required value="{{ $tampil->no_telp }}">
                    </div>
                    <div class="form-group">
                        <label for="input5" class="form-label">Email</label>
                        <input type="email" id="input5" name="email" class="form-control" value="{{ $tampil->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" required>{{ $tampil->keterangan }}</textarea>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
                @endforeach
        	</div>
        </div>
    </div>
</div>
@endsection