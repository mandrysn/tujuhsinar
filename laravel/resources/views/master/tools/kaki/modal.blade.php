<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
<div class="modal fade bs-example" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kaki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		<form method="post" action="{{ route('kaki.store') }}">
                    {!! csrf_field() !!}
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
                            <label for="input1" class="form-label">nama kaki</label>
                            <input type="text" class="form-control" name="nama_kaki" id="input1" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input2" class="form-label">Harga Tambahan</label>
                            <input type="text" class="form-control" name="tambahan_harga" id="input2" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Tipe Cetak</label>
                            <select class="form-control" name="produk_id" required>
                                <option>-- Pilih Tipe Cetak --</option>
                                <option value="1">Outdoor</option>
                                <option value="2">Indoor</option>
                                <option value="3">Merchant</option>
                                <option value="4">Print A3</option>
                                <option value="5">Costum</option>
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