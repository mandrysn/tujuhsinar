<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
<div class="modal fade bs-example" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ukuran Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		<form method="post" action="{{ route('ukuran-bahan.store') }}">
                    {!! csrf_field() !!}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Tipe Produk</label>
                            <select class="form-control" name="produk_id" id="produk_id" required>
                                <option>-- Pilih Tipe Produk --</option>
                                <option value="1">Outdoor</option>
                                <option value="2">Indoor</option>
                                <option value="3">Merchant</option>
                                <option value="4">Print A3</option>
                                <option value="5">Costum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input3" class="form-label">Nama Ukuarn Bahana</label>
                            <input type="text" class="form-control" name="nm_ukuran_bahan" placeholder="Bahan Ukuran 1M" id="input3" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Bahan</label>
                            <select class="form-control" name="barang_id" id="bahan" required>
                                <option selected>-- Pilih Bahan --</option>
                                {{-- @foreach($bahan as $data)
                                <option value="{{ $data->id }}">{{ $data->nm_barang }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Minimal Range</label>
                            <input type="number" class="form-control" name="range_min" step="0.01" min="0" id="input_kn" placeholder="x.01" required>
                        </div>
                    </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input6" class="form-label">Maximal Range</label>
                                <input type="number" class="form-control" step="0.01" name="range_max" min="0" value="" id="input_kn" placeholder="x.99" required>
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