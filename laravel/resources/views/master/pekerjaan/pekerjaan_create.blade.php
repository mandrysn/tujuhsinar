@extends('layout.layout')
@section('title', 'Tambah Pekerjaan')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Pekerjaan
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('pekerjaan.store') }}">
        			{!! csrf_field() !!}
        			<div class="form-group">
        				<label for="input1" class="form-label">Nama Pekerjaan</label>
        				<input type="text" class="form-control" name="nm_pekerjaan" id="input1" required>
        			</div>
        			<div class="form-group">
        				<label for="input2" class="form-label">Jenis Pekerjaan</label>
        				<input type="text" class="form-control" name="nm_jenis" id="input2" required>
        			</div>
                    <div class="form-group">
                        <label for="textarea1" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="textarea1" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="select1" class="form-label">Printer</label>
                        <select name="printer_id" class="form-control" id="select1">
                            <option value="">-- Silahkan Pilih --</option>
                        @foreach($printer as $tampil)
                            <option value="{{ $tampil->id }}">{{ $tampil->nm_printer }}</option>
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