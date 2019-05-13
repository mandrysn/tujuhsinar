@extends('layout.layout');
@section('title', 'Edit Pembelian');
@section('content')
	<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Pembelian
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('pembelian.update', $data->id) }}">
                    {{ method_field('PATCH') }}
        			{!! csrf_field() !!}
                    <div class="form-group">
                        <label class="form-label">Tanggal Order</label>
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <input type="date" id="date-picker" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime($data->tgl_pembelian)) }}" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="input4" class="form-label">Tipe Pembayaran</label>
                         <select class="form-control" name="tipe_pembayaran" id="input4" required>
                            <option value="">Silahkan Pilih</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Kredit">Kredit</option>
                         </select>
                    </div>
        			<div class="form-group">
        				<label for="input1" class="form-label">Supplier</label>
        				<select class="form-control" name="supplier" required="">
        					<option value="">-- Pilih Supplier --</option>
        					@foreach($suppliers as $supplier)
        					   @if($supplier->id == $data->id)
                                    <option value="{{ $supplier->id }}" selected="">{{ $supplier->nm_lengkap }}</option>
                                @else
                                    <option value="{{ $supplier->id }}">{{ $supplier->nm_lengkap }}</option>
                                @endif
        					@endforeach
        				</select>
        			</div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Barang</label>
                        <select class="form-control" name="barang" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $barang)
                                @if($barang->id == $data->id)
                                    <option value="{{ $barang->id }}" selected="">{{ $barang->nm_barang }}</option>
                                @else
                                    <option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="form-label">Qty</label>
                        <input type="text" class="form-control" name="qty" id="input3" value="{{ $data->qty }}" required>
                    </div>
        			<div class="form-group">
        				<label for="input4" class="form-label">Harga</label>
        				<input type="text" class="form-control" name="harga" id="input4" value="{{ $data->harga }}" required>
        			</div>
                    
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('pembelian.index') }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection