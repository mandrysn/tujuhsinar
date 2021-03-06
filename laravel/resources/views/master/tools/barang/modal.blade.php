<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
<div class="modal fade bs-example" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row" style="max-height: 80vh;overflow-y: scroll;width: 100%;">
                <div class="col-md-12 col-lg-12">
        		<form method="post" action="{{ route('barang.store') }}">
                    {!! csrf_field() !!}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
                            <label for="input2" class="form-label">Barcode</label>
                            <input type="text" class="form-control" name="barcode" id="input2" required>
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="produk_id" class="form-label">Tipe Produksi</label>
                            <select class="form-control selectpicker" data-live-search="true" name="produk_id" id="produk_id" multiple required>
                                <option>-- Pilih Tipe Produksi --</option>
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
                            <label for="input3" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nm_barang" id="input3" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input4" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="input4" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input5" class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="input5" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="hrg_beli" id="input6" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Minimal Stok</label>
                            <input type="text" class="form-control" name="min_stok" id="input6" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Pilih Supplier</label>
                           
                            <div class="input-group">
                                <span class="input-group-btn">
                                <button class="btn btn-default tombol-pilih"  type="button" data-toggle="modal" data-target="#pilih-supplier" id="tombol-pilih-supplier">Pilih</button>
                                </span>
                                <input type="text" class="form-control" id="detail-supplier" disabled="" readonly="">
                                <input type="hidden" class="form-control" id="supplier-id" name="supplier_id" >
                            </div>
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