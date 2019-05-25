<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
<div class="modal fade bs-example" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form method="post" action="{{ route('pengguna.store') }}">
                        {!! csrf_field() !!}
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="input1" class="form-label">Nama</label>
                                <input type="text" id="input1" name="nama" class="form-control" value="{{ old('nama') }}" required>
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
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('passwordname') ? ' has-error' : '' }}">
                                <label for="input7" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                                <label for="input4" class="form-label">Nomor Telpon</label>
                                <input type="text" id="input4" name="no_telp" class="form-control" value="{{ old('no_telp') }}" required>
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
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="select2" class="form-label">Sebagai</label>
                                <select class="selectpicker form-control" name="role" id="select2" required>
                                    <option disable>-- Pilih Role --</option>
                                    <option value="2">Order</option>
                                    <option value="3">Kasir</option>
                                    <option value="5">Owner</option>
                                    <option value="6">Outdoor</option>
                                    <option value="7">Indoor</option>
                                    <option value="8">Merchandise</option>
                                    <option value="9">Print</option>
                                    <option value="10">Costum</option>
                                </select>
                            </div>
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
<!-- End Modal Code -->