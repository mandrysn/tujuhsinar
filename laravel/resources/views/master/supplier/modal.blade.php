<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
<div class="modal fade bs-example" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Costumer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form method="post" action="{{ route('supplier.store') }}">
                        {!! csrf_field() !!}
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input1" class="form-label">Nama Lengkap</label>
                                <input type="text" id="input1" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input3" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input4" class="form-label">Nomor Telpon</label>
                                <input type="text" id="input4" name="no_telp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input5" class="form-label">Email</label>
                                <input type="email" id="input5" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input6" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" required></textarea>
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