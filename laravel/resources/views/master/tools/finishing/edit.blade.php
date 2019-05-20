<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
@forelse($data as $index => $tampil)
<div class="modal fade bs-example" id="edit-{{ $tampil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Finishing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		<form method="post" action="{{ route('editor.update', $tampil->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="col-lg-12 col-md-12">
            			<div class="form-group">
            				<label for="select2" class="form-label">Tipe Member</label>
            				<select class="form-control" name="member_id" required>
            					<option value="">-- Pilih Member --</option>
            					@foreach($member as $tampil)
            					<option value="{{ $tampil->id }}">{{ $tampil->nm_tipe }}</option>
            					@endforeach
            				</select>
            			</div>
            		</div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input1" class="form-label">Nama Finishing</label>
                            <input type="text" class="form-control" name="nama_finishing" value="{{ $tampil->nama_finishing }}" id="input1" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input2" class="form-label">Harga Tambahan</label>
                            <input type="text" class="form-control" name="tambahan_harga" value="{{ $tampil->tambahan_harga }}" id="input2" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Tipe Cetak</label>
                            <select class="form-control" name="produk_id" required>
                                <option>-- Pilih Tipe Cetak --</option>
                                <option value="1" {{ $tampil->produk_id == 1 ? "selected" : "" }}>Outdoor</option>
                                <option value="2" {{ $tampil->produk_id == 2 ? "selected" : "" }}>Indoor</option>
                                <option value="3" {{ $tampil->produk_id == 3 ? "selected" : "" }}>Merchant</option>
                                <option value="4" {{ $tampil->produk_id == 4 ? "selected" : "" }}>Print A3</option>
                                <option value="5" {{ $tampil->produk_id == 5 ? "selected" : "" }}>Costum</option>
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