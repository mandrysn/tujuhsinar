@extends('layout.layout')
@section('title', 'Tambah Costumer')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Costumer
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('pelanggan.store') }}">
        			{!! csrf_field() !!}
					<div class="form-group">
        				<label for="input1" class="form-label">ID Member</label>
        				<input type="text" id="input1" name="member_id" class="form-control" value="{{ Helper::idLastMember() }}" required readonly>
        			</div>
					<div class="form-group">
        				<label for="input1" class="form-label">Nama Pelanggan</label>
        				<input type="text" id="input1" name="nama" class="form-control" required>
        			</div>
        			<div class="form-group">
        				<label for="input3" class="form-label">Alamat</label>
        				<textarea class="form-control" name="alamat" required></textarea>
        			</div>
                    <div class="form-group">
                        <label for="input4" class="form-label">Nomor Telpon</label>
                        <input type="text" id="input4" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="form-label">Email</label>
                        <input type="email" id="input5" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="form-label">Tipe Member</label>
                        <select class="form-control" name="member_id" id="input6" required="">
                            @foreach($member as $tampil)
                                <option value="{{ $tampil->id }}">{{ $tampil->nm_tipe }}</option>
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