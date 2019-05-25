<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
@forelse($data as $index => $pelanggan)
<div class="modal fade bs-example" id="edit-{{ $pelanggan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Costumer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		    <form method="post" action="{{ route('member.update', $pelanggan->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input1" class="form-label">ID Costumer</label>
                            <input type="text" id="input1" name="member_id" value="{{ sprintf("%06s", $pelanggan->member_id) }}" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input1" class="form-label">Nama Pelanggan</label>
                            <input type="text" id="input1" name="nama" value="{{ $pelanggan->nama }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input3" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" required>{{ $pelanggan->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input4" class="form-label">Nomor Telpon</label>
                            <input type="text" id="input4" name="no_telp" value="{{ $pelanggan->no_telp }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input5" class="form-label">Email</label>
                            <input type="email" id="input5" name="email" class="form-control" value="{{ $pelanggan->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Tipe Member</label>
                            <select class="form-control" name="member_id" id="input6" required="">
                                @foreach($member as $tampil)
                                    @if($tampil->id == $pelanggan->member_id)
                                    <option value="{{ $tampil->id }}" selected>{{ $tampil->nm_tipe }}</option>
                                    @else
                                    <option value="{{ $tampil->id }}">{{ $tampil->nm_tipe }}</option>
                                    @endif
                                @endforeach
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

@empty
@endforelse
<!-- End Modal Code -->