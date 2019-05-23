<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
@forelse($data as $index => $tampil)
<div class="modal fade bs-example" id="edit-{{ $tampil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		    <form method="post" action="{{ route('barang.update', $tampil->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
                            <label for="input2" class="form-label">Barcode</label>
                            <input type="text" class="form-control" name="barcode" id="input2" value="{{ $tampil->barcode }}" required>
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
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Ukuran Bahan</label>
                            <select class="form-control" name="ukuran_bahan_id" required="">
                                <option value="">-- Pilih Ukuran Bahan --</option>
                                @foreach($ukuran as $data)
                                <option value="{{ $data->id }}" {{ $tampil->ukuran_bahan_id == $data->id ? "selected" : "" }}>{{ $data->nm_ukuran_bahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input3" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nm_barang" id="input3" value="{{ $tampil->nm_barang }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input4" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="input4" value="{{ $tampil->kategori }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input5" class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="input5" value="{{ $tampil->satuan }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="hrg_beli" id="input6" value="{{ $tampil->hrg_beli }}" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Minimal Stok</label>
                            <input type="text" class="form-control" name="min_stok" id="input6" value="{{ $tampil->min_stok }}" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Supplier</label>
                            <select class="form-control" name="supplier_id" required="">
                                <option value="">-- Pilih Member --</option>
                                @foreach($supplier as $data)
                                <option value="{{ $data->id }}" {{ $tampil->supplier_id == $data->id ? "selected" : "" }}>{{ $data->nm_lengkap }}</option>
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