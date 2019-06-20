@extends('layout.layout')
@section('title', 'Detail Data Order')
@section('content')
@if ( ! is_null($order->keterangan) )
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Status Order
                <ul class="panel-tools">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                </ul> 
            </div>
            <div class="panel-body">
                                <form >
                <div id="outdoor_show" class="row col-md-12">
                 <div class="col-md-12 col-lg-2">
                     <div class="form-group">
                        <label for="input2" class="form-label">No</label>
                        <input type="text" class="form-control" name="noorder" required disabled value="{{ $order->order }}">
                    </div>
                </div>

                <div class="col-md-12 col-lg-4">
                    <div class="form-group">
                        <label for="select2" class="form-label">Customer</label>
                        <input type="hidden" id="idmember" name="member_id" value="{{ $order->pelanggan->member_id }}">
                        <input type="text" class="form-control" name="customer_id" required disabled value="{{ $order->pelanggan->nama }} [{{ $order->pelanggan->member->nm_tipe }}]">
                        
                    </div>

                </div>
        
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Tanggal Order</label>
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group"> 
                                        <input type="text" id="date-picker" class="form-control" name="tanggal" value="{{ Helper::tanggalId($order->tanggal) }}" disabled required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div> 

                
            </div>
        </form>
                <h1>{!! trim($order->keterangan) !!}</h1>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Total Harga
                <ul class="panel-tools">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                </ul> 
            </div>
            <div class="panel-body">
                <h1>Rp. {{ number_format($totalan->total) }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row"> 
    <!-- Start Panel -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Data Pekerjaan </div>
            @if ($order->status_payment == 'belum bayar')
                @if (Auth::user()->role == 2 || Auth::user()->role == 1)
                    <a href="{{ route('order.edit', $id) }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Order</a>
                @endif

                @if (Auth::user()->role == 3 || Auth::user()->role == 1)
                    <a href="#" data-toggle="modal" data-target="#edit-data{{ $id }}" class="btn btn-option2"><i class="fa fa-money"></i> Pembayaran</a>
                @endif
            @else
                <a href="{{ route('order.print', $id) }}" target="_blank" class="btn btn-option2"><i class="fa fa-money"></i> Print Nota</a>
                <a  href="{{ route('order.print-spk', $id) }}"   class="btn btn-option2" target="_blank"><i class="fa fa-money"></i> Print Nota & SPK</a>

                <a href="{{ route('order.spk', $id) }}" target="_blank" class="btn btn-option2"><i class="fa fa-money"></i> Print SPK</a>
            @endif
            <a href="{{ route('order.index') }}" class="btn btn-default">Kembali</a>

            <br>
            <br>
            <div class="panel-body table-responsive">
                <table id="example0" class="table display">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Deadline</th>
                            <th>Produk</th>
                            <th>Bahan</th>
                            <th>Diskon</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $datas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <th>{{ Helper::tanggalId($datas->deadline) }}</th>
                            <td>{{ $datas->nama_produk }}</td>
                            <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                            <td>{{ $datas->diskon }} %</td>
                            <td>{{ $datas->qty }}</td>
                            <td>Rp. {{ number_format($datas->total) }}</td>
                            <td>{!! $datas->keterangan_sub !!}</td>
                            <td>
                                @if ($datas->status_produksi == '1')
                                Antrian
                                @elseif ($datas->status_produksi == '2')
                                Printing
                                @elseif ($datas->status_produksi == '3')
                                Selesai
                                @else
                                Sudah diambil
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('order.subkerja.hapus', $datas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button @if($order->status_payment != 'belum bayar') disabled @endif class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-trash"></i>Delete</button>
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

@include('transaksi.order.pembayaran')



@endsection