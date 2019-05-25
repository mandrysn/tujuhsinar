@extends('layout.layout')
@section('title', 'Edit Harga')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Member
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
                
                    <form method="post" action="{{ route('harga.store') }}">
                            {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="select1" class="form-label">Tipe Member</label>
                        <select class="form-control" name="harga_id">
                                <option value="{{ $datas->id }}" selected>{{ $datas->member->nm_tipe }}</option>
                        </select>
                    </div>
                            <div class="form-group">
                                <label for="input" class="form-label">keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $datas->keterangan }}" id="input" readonly>
                            </div>
           </div>
       </div>
   </div>
   <div class="col-md-12 col-lg-8">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Harga
                    <ul class="panel-tools">
                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    </ul>
                </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="form-group">
                            <label for="input1" class="form-label">Nama Pekerjaan</label>
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="form-group">
                            <label for="input2" class="form-label">Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" id="input2" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label for="" class="form-label">Range Quantity</label>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" name="range_min" id="input3" placeholder="Min" required>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" name="range_max" id="input4" placeholder="Max" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="form-group">
                            <label for="input4" class="form-label">Harga Pokok</label>
                            <input type="text" class="form-control" name="hrg_pokok" id="input5" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="form-group">
                            <label for="input5" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" name="hrg_jual" id="input6" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <div class="form-group">
                            <label for="input5" class="form-label">Diskon</label>
                            <input type="text" class="form-control" name="disc" id="input7" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4" style="margin-top:28px">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
                    </div>
                </div>
    
            </form>
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
                            <th>Pekerjaan</th>
                            <th>Range Quantity</th>
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
                            <td>{{ $detail->range_min }} - {{ $detail->range_max }}</td>
                            <td>{{ number_format($detail->harga_pokok) }}</td>
                            <td>{{ number_format($detail->harga_jual) }}</td>
                            <td>{{ $detail->disc }}</td>
                            <td>
                                <form action="{{ route('harga.destroy', $detail->id) }}" method="post">
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