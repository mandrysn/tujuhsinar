<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
@forelse($user as $index => $data)
<div class="modal fade bs-example" id="edit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		    <form method="post" action="{{ route('pengguna.update', $data->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="input1" class="form-label">Nama</label>
                            <input type="text" id="input1" name="nama" class="form-control" value="{{ $data->nama }}" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="input3" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('lama') ? ' has-error' : '' }}">
                            <label for="input7" class="form-label">Password Lama</label>
                            <input type="password" id="input1" name="lama" class="form-control" value="">
                            @if ($errors->has('lama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lama') }}</strong>
                            </span>
                            @else
                            <span class="help-block">
                                <strong>Kosongkan bila tidak ada perubahan password*</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('baru') ? ' has-error' : '' }}">
                            <label for="input7" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" name="baru" value="">
                            @if ($errors->has('baru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('baru') }}</strong>
                            </span>
                            @else
                            <span class="help-block">
                                <strong>Kosongkan bila tidak ada perubahan password*</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="input4" class="form-label">Nomor Telpon</label>
                            <input type="text" id="input4" name="no_telp" class="form-control" value="{{ $data->no_telp }}" required>
                            @if ($errors->has('no_telp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="input6" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        @if(Auth::user()->id == 1)
                        <div class="form-group">
                            <label for="select2" class="form-label">Sebagai</label>
                            <select class="selectpicker form-control" name="role" id="select2" required>
                                    <option value="2" {{ ($data->role == 2) ? 'selected' : '' }}>Order</option>
                                    <option value="3" {{ ($data->role == 3) ? 'selected' : '' }}>Kasir</option>
                                    <option value="5" {{ ($data->role == 5) ? 'selected' : '' }}>Owner</option>
                                    <option value="6" {{ ($data->role == 6) ? 'selected' : '' }}>Outdoor</option>
                                    <option value="7" {{ ($data->role == 7) ? 'selected' : '' }}>Indoor</option>
                                    <option value="8" {{ ($data->role == 8) ? 'selected' : '' }}>Merchandise</option>
                                    <option value="9" {{ ($data->role == 9) ? 'selected' : '' }}>Print</option>
                                    <option value="10" {{ ($data->role == 10) ? 'selected' : '' }}>Costum</option>
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        		</form>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse
<!-- End Modal Code -->