@extends('layout.layout')
@section('title', 'Edit Harga')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-3">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Harga
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
                    <div class="form-group">
                        <label for="select1" class="form-label">Tipe Member</label>
                        <input type="text" class="form-control" name="member_id" value="{{ $datas->member->nm_tipe }}" id="input" disabled>
                    </div>
                            <div class="form-group">
                                <label for="input" class="form-label">keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $datas->keterangan }}" id="input" disabled>
                            </div>
           </div>
       </div>
   </div>
   <div class="col-md-12 col-lg-9">
    <div class="panel panel-default">
        <div class="panel-title">Data Harga</div>
        <div class="panel-body">
            <div class="row">
                    @foreach($data as $datas)
                    <form method="post" action="{{ route('harga.update', $datas->id) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input2" class="form-label">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" id="input2" value="{{ $datas->ukuran }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input3" class="form-label">Range Quantity Min</label>
                        <input type="text" class="form-control" name="range_min" id="input3" value="{{ $datas->range_min }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input3" class="form-label">Range Quantity Max</label>
                        <input type="text" class="form-control" name="range_max" id="input4" value="{{ $datas->range_max }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input4" class="form-label">Harga Pokok</label>
                        <input type="text" class="form-control" name="hrg_pokok" id="input5" value="{{ $datas->harga_pokok }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input5" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control" name="hrg_jual" id="input6" value="{{ $datas->harga_jual }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="input5" class="form-label">Diskon</label>
                        <input type="text" class="form-control" name="disc" id="input7" value="{{ $datas->disc }}" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3" style="margin-top:28px">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
                </div>
            </div>

        </form>
        @endforeach
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
                            <th>Member</th>
                            <th>Range Quantity</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $datas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $datas }}</td>
                            <td>{{ $datas->harga->member->nm_tipe }}</td>
                            <td>{{ $datas->range_min }} - {{ $datas->range_max }}</td>
                            <td>
                                <form action="{{ route('harga.destroy', $datas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('harga.edit', $datas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
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