@extends('layout.layout')
@section('title', 'Edit Harga')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Data Harga
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
            @foreach($data as $datas)
                <form method="post" action="{{ route('harga.update', $datas->id) }}">
                    {!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="select1" class="form-label">Tipe Member</label>
                        <select class="form-control" name="member_id" required>
                            <option value="">-- Pilih Member --</option>
                            @foreach($member as $tampil)
                            @if($tampil->id == $datas->member_id)
                            <option value="{{ $tampil->id }}" selected>{{ $tampil->nm_tipe }}</option>
                            @else
                            <option value="{{ $tampil->id }}">{{ $tampil->nm_tipe }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                            <div class="form-group">
                                <label for="input" class="form-label">keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $datas->keterangan }}" id="input" required>
                            </div>
                            <div class="col-md-12 col-lg-12" style="margin-left:-15px">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('harga.show', $datas->id) }}" class="btn btn-option1"><i class="fa fa-ioxhost"></i>Detail</a>
                                    <a href="{{ URL(Helper::backButton()) }}" class="btn btn-option2"><i class="fa fa-info"></i>Kembali</a>
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
                            <th>Tipe Member</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cekData as $index => $cekDatas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cekDatas->member->nm_tipe }}</td>
                            <td>{{ $cekDatas->member->keterangan }}</td>
                            <td>
                                <form action="{{ route('harga.destroy', $cekDatas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('harga.edit', $cekDatas->id) }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
                                    <a href="{{ route('harga.show', $cekDatas->id) }}" class="btn btn-option1"><i class="fa fa-ioxhost"></i>Detail</a>
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