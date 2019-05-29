@extends('layout.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="container-padding animated fadeInRight"> 
        <div class="row"> 
            <!-- Start Panel -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        <form class="form-horizontal"  method="post" action="{{ route('laporan.cetak.custom') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="periode" value="{{ $periode }}" />
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                    <a href="{{ route('laporan.transaksi') }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
                                </div>
                        </form>
                    </div>
                    <div class="panel-body table-responsive">
    
                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                        <th>No</th>
                                        <th>No Order</th>
                                        <th>Deadline</th>
                                        <th>Costumer</th>
                                        <th >Bahan</th>
                                        <th >Estimasi</th>
                                        <th >Qty</th>
                                        <th>Keterangan</th>
                                            </tr>
                            </thead>
                            <tbody>
                                    @forelse($data as $index => $datas)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>'{{ $datas->orderkerja->order }}</td>
                                        <td>{{ Helper::tanggalId($datas->deadline) }}</td>
                                        <td>{{ $datas->orderkerja->pelanggan->nama }}</td>
                                        <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                                        <td>{{ number_format($datas->harga) }}</td>
                                        <td>{{ $datas->qty }}</td>
                                        <td>{!! $datas->keterangan_sub !!}</td>
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
        <!-- End Row --> 
    </div>
@endsection