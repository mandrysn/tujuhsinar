@extends('layout.layout')
@section('title', 'Edit Petugas')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Data Admin
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('pengguna.update', $user->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
        			<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        				<label for="input1" class="form-label">Nama</label>
        				<input type="text" id="input1" name="nama" class="form-control" value="{{ $user->nama }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>
        			<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="input3" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                        <label for="input4" class="form-label">Nomor Telpon</label>
                        <input type="text" id="input4" name="no_telp" class="form-control" value="{{ $user->no_telp }}" required>
                        @if ($errors->has('no_telp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_telp') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label for="input6" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}" required>
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>
                    @if(Auth::user()->id == 1)
                    <div class="form-group">
                        <label for="select2" class="form-label">Sebagai</label>
                        <select class="selectpicker form-control" name="role" id="select2" required>
                            <option value="2" {{ ($user->role == 2) ? 'selected' : '' }}>Owner</option>
                            <option value="3" {{ ($user->role == 3) ? 'selected' : '' }}>Produksi</option>
                            <option value="4" {{ ($user->role == 4) ? 'selected' : '' }}>Kasir</option>
                            <option value="5" {{ ($user->role == 5) ? 'selected' : '' }}>Setting</option>
                        </select>
                    </div>
                    @endif
                    <br>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('gantiPass', $user->id) }}" class="btn btn-warning">Ganti Password</a>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection