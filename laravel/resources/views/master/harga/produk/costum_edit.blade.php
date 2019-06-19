@extends('layout.layout')
@section('title', 'Edit Harga')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="widget-box">
            <div class="widget-title"> Data Harga Produk {{ $datas->keterangan }} </div>
            <div role="tabpanel"> 
                
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item active"><a class="nav-link" href="#costum" aria-controls="costum" role="tab" data-toggle="tab">Costum Produk</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="costum">
                        <form method="post" action="{{ route('harga.costumProdukUpdate') }}" >
                            <div id="costum_show" class="row col-md-12">
                                {!! csrf_field() !!}
                                {{ Form::hidden('member_id', $datas->member_id) }}
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="select2" class="form-label">Tipe Member</label>
                                        <input type="text" class="form-control" value="{{ $datas->member->nm_tipe }}" id="input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="input" class="form-label">keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="input" value="{{ $datas->keterangan }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="input5" class="form-label">Nama Produk</label>
                                        {{-- <input type="text" class="form-control" name="nama_produk" id="input_kn" placeholder="Nama Produk" required> --}}
                                        <select class="form-control" name="barang_id" id="input_fly" required="">
                                            <option selected>-- Pilih produk --</option>
                                            @foreach($barangs as $barang)
                                                @if($barang->produk_id == 5)
                                                    <option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Harga</label>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <input type="text" class="form-control" name="harga_pokok" min="0" max="99999999" id="input_kn" placeholder="Pokok" required>
                                            </div>
                                            <div class="col-md-12 col-lg-6">
                                                <input type="text" class="form-control" name="harga_jual" min="0" max="99999999" id="input_kn" placeholder="Jual" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-lg-1">
                                    <div class="form-group">
                                        <label for="input5" class="form-label">Diskon</label>
                                        <input type="text" class="form-control" name="disc" id="input_kn" value="0" min="0" placeholder="%" required>
                                    </div>
                                </div>
                            
                               <!--  <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="form-label">Range Quantity</label>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <input type="number" class="form-control" name="range_min" min="0" id="input_kn" placeholder="Min" required>
                                            </div>
                                            <div class="col-md-12 col-lg-6">
                                                <input type="number" class="form-control" name="range_max" min="1" id="input_kn" placeholder="Max" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            
                                <div class="col-md-12 col-lg-4" style="margin-top: 28px">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/admin/master/harga') }}" class="btn btn-default">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title">Data </div>
            <div class="panel-body">
                <table id="example0" class="table display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                           
                            <th>Harga Pokok</th>
                            <th>Harga Jual</th>
                            <th>Diskon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->Barang->nm_barang }}</td>
                            
                            <td>{{ number_format($detail->harga_pokok) }}</td>
                            <td>{{ number_format($detail->harga_jual) }}</td>
                            <td>{{ $detail->disc }} %</td>
                            <td>
                                <form action="{{ route('harga.outdoorDestroy', $detail->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
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
</div>
@endsection