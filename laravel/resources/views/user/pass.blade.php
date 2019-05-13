@extends('layout.layout')
@section('title', 'Edit Petugas')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Password {{ $user->Tugas }}
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
        			<div class="form-group">
        				<label for="input1" class="form-label">Password Lama</label>
        				<input type="password" id="input1" name="lama" class="form-control" value="" required>
                    </div>
        			<div class="form-group">
                        <label for="input3" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" name="baru" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="input4" class="form-label">Konfirmasi Password</label>
                        <input type="password" id="input4" name="confirm" class="form-control" value="" required>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection