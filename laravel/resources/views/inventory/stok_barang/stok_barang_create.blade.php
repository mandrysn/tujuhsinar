@extends('layout.layout');
@section('title', 'Stok Barang');
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Stok Barang
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('stokbarang.store') }}">
        			{!! csrf_field() !!}
                    <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <input type="date" id="date-picker" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime(\Carbon\Carbon::now())) }}" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="input1" class="form-label">Barang</label>
                        <select class="form-control" name="barang" id="barang" onchange="get_qty_barang()" required="">
                           <option value="">-- Pilih Barang --</option>
                           @foreach($stok_barang_pembelian as $data)
                           <option value="{{ $data->pembelian_id }}">{{ $data->pembelian->barang->nm_barang }} - {{ $data->pembelian->supplier->nm_lengkap }}</option>
                           @endforeach
                       </select>
                   </div>
                <div class="form-group">
                    <label for="input3" class="form-label">Qty Sekarang</label>
                    <input type="text" class="form-control" name="qtys" id="qtys" required readonly>
                </div>
                <div class="form-group">
                    <label for="input3" class="form-label">Keperluan</label>
                    <input type="text" class="form-control" name="keperluan" id="input3" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('stokbarang.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function get_qty_barang() {   
        var barang = document.getElementById("barang").value;
        jQuery.ajax({
            url: "{{ url('admin/inventory/pembelian/barang/') }}/"+barang,
            type: "GET",
            success: function(data) {
                jQuery('#qtys').val(data);
            }
            });
    }
</script>
@endsection