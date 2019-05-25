@extends('layout.layout')
@section('title', 'Tambah Tipe Member')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Tipe Member
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('member.store') }}">
        			{!! csrf_field() !!}
        			<div class="form-group">
        				<label for="input1" class="form-label">Nama Tipe Member</label>
        				<input type="text" class="form-control" name="nm_tipe" id="input1" required>
        			</div>
        			<div class="form-group">
        				<label for="textarea1" class="form-label">Keterangan</label>
        				<textarea name="keterangan" class="form-control" required=""></textarea>
        			</div>
        			<button type="submit" class="btn btn-primary">Submit</button>
        			<a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection