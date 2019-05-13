@extends('layout.layout');
@section('title', 'Tambah Editor');
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Editor
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('editor.store') }}">
        			{!! csrf_field() !!}
        			<div class="form-group">
        				<label for="input1" class="form-label">Nama Editor</label>
        				<input type="text" id="input1" name="nama" class="form-control" required>
        			</div>
        			<div class="form-group">
        				<label for="input2" class="form-label">Jenis Kelamin</label>
        				<div class="radio">
                            <input type="radio" name="jk" id="radio1" value="l">
                            <label for="radio1"> Laki-Laki </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="jk" id="radio2" value="p">
                            <label for="radio2"> Perempuan </label>
                        </div>
        			</div>
        			<div class="form-group">
        				<label for="input3" class="form-label">Alamat</label>
        				<textarea class="form-control" name="alamat" required></textarea>
        			</div>
                    <div class="form-group">
                        <label for="input4" class="form-label">Nomor Telpon</label>
                        <input type="text" id="input4" name="no_hp" class="form-control" required>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('editor.index') }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection