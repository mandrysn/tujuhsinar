@extends('layout.layout')
@section('title', 'Tambah Data Order')
@section('content')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> 
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Order
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        		</ul> 
        	</div>
        	<div class="panel-body">
                <div id="outdoor_show" class="row">
                    <div class="col-md-12 col-lg-2">
                        <div class="form-group">
                            <label for="input2" class="form-label">No</label>
                            <input type="text" class="form-control" name="noorder" required disabled value="{{ $order->order }}">
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="select2" class="form-label">Customer</label>
                            <input type="text" class="form-control" name="customer_id" required disabled value="{{ $order->pelanggan->nama }} [{{ $order->pelanggan->member->nm_tipe }}] {{ sprintf("%06s", $order->pelanggan->id) }}">
                            
                        </div>

                    </div>
        
                    <div class="col-md-12 col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Tanggal Order</label>
                            <input type="text" id="date-picker" class="form-control" name="tanggal" value="{{ Helper::tanggalId($order->tanggal) }}" disabled required>
                        </div>
                    </div> 
                
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="widget-box">
            <div class="widget-title"> Data Order Produk </div>
            <div role="tabpanel "> 
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"><a class="btn btn-default" href="#outdoor" aria-controls="outdoor" role="tab" data-toggle="tab">Outdoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#indoor" aria-controls="indoor" role="tab" data-toggle="tab">Indoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchandise</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#a3" aria-controls="a3" role="tab" data-toggle="tab">Print A3</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#costum" aria-controls="costum" role="tab" data-toggle="tab">Costum</a></li>
                </ul>
            </div>
        </div>
        
        <div class="widget-box">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel " class="tab-pane active" id="outdoor">
                    @include('transaksi.order.produk.outdoor_edit')
                </div>
                <div role="tabpanel" class="tab-pane" id="indoor">
                    @include('transaksi.order.produk.indoor_edit')
                </div>
                <div role="tabpanel" class="tab-pane" id="merchant">
                    @include('transaksi.order.produk.merchant_edit')
                </div>
                <div role="tabpanel" class="tab-pane" id="a3">
                    @include('transaksi.order.produk.a3_edit')
                </div>
                <div role="tabpanel" class="tab-pane" id="costum">
                    @include('transaksi.order.produk.costum_edit')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row"> 
    <!-- Start Panel -->
    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-title"> Data Pekerjaan </div>
            <div class="panel-body table-responsive">
                <table id="example0" class="table display">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Produk</th>
                            <th>Bahan</th>
                            <th>Diskon</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $datas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $datas->nama_produk }}</td>
                            <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                            <td>{{ $datas->diskon }} %</td>
                            <td>{{ $datas->qty }}</td>
                            <td>Rp. {{ number_format($datas->harga) }}</td>
                            <td>Rp. {{ number_format($datas->total) }}</td>
                            <td>{!! $datas->keterangan_sub !!}</td>
                            <td>
                                <form action="{{ route('order.subkerja.hapus', $datas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- End Panel --> 
</div>

@endsection