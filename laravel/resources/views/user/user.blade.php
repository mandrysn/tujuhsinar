@extends('layout.layout')
@section('title', 'Data Pengguna')
@section('content')
<div class="row">
    <!-- Start Panel -->
<div class="col-md-12">
    @if(Session::has('alert-user'))
        <div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-user') }}</div>
    @endif
    <div class="panel panel-default">
        <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Admin</a>
        <br>
        <br>
        <div class="panel-title"> Data Petugas </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Sebagai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user as $index => $datas)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->username }}</td>
                        <td>{{ $datas->no_telp }}</td>
                        <td>{{ $datas->alamat }}</td>
                        <td>{{ $datas->Tugas }}</td>
                        <td>
                            <form action="{{ route('pengguna.destroy', $datas->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</a>
                            @if($datas->role == 1)
                            @elseif($datas->id == Auth::user()->id)
                            @else
                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
                            @endif
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
@include('user.modal')
@include('user.edit')
@endsection