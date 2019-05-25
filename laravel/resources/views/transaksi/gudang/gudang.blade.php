@extends('layout.layout')
@section('title', 'Tambah Data Order')
@section('content')

<div class="row"> 
    <!-- Start Panel -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title"> Data Pekerjaan </div>
            <div class="panel-body table-responsive">
                <table id="example0" class="table display">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Costumer</th>
                            <th>Deadline</th>
                            <th>Bahan</th>
                            <th>Diskon</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $datas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $datas->orderkerja->pelanggan->nama }}</td>
                            <td>{{ $datas->tgl_deadline }}</td>
                            <td>{{ is_null($datas->barang_id) ? '-' : $datas->barang->nm_barang }}</td>
                            <td>{{ $datas->diskon }} %</td>
                            <td>{{ $datas->qty }}</td>
                            <td>Rp. {{ number_format($datas->total) }}</td>
                            <td>{!! $datas->keterangan !!}</td>
                            <td>
                                @if ($datas->status_produksi == '3')
                                <a class="btn btn-option2" onclick="return confirm('Barang telah selesai. Apakah mau diambil ?')" href="{{ route('produksi.update_status',$datas->id) }}"><i class="fa fa-check"></i>Selesai</a>
                                @elseif ($datas->status_produksi == '4')
                                <a class="btn btn-option2" ><i class="fa fa-cubes"></i>Sudah di ambil</a>
                                
                                @endif
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