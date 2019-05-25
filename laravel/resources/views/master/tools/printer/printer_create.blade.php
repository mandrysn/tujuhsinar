@extends('layout.layout')
@section('title', 'Tambah Printer')
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Printer
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('printer.store') }}">
        			{!! csrf_field() !!}
                    <div class="form-group">
                        <label for="input1" class="form-label">Kode Printer</label>
                        <input type="text" class="form-control" name="kd_printer" id="input1" required>
                    </div>
        			<div class="form-group">
        				<label for="input2" class="form-label">Nama Printer</label>
        				<input type="text" class="form-control" name="nm_printer" id="input2" required>
        			</div>
        			<div class="form-group">
        				<label for="input3" class="form-label">Merk</label>
        				<input type="text" class="form-control" name="merk" id="input3" required>
        			</div>
        			<div class="form-group">
        				<label for="input4" class="form-label">Status</label>
						<select class="form-control" name="status" id="input4" required>
							<option value="">Silahkan Pilih</option>
							<option value="ada">Ada</option>
							<option value="digunakan">Digunakan</option>
							<option value="rusak">Rusak</option>
						</select>
        			</div>
                    <div class="form-group">
                        <label for="textarea1" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="textarea1" required></textarea>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection