<!-- Start Modal Code -->
<!-- Link -->
<!-- Modal -->
@forelse($data as $index => $tampil)
<div class="modal fade bs-example" id="edit-{{ $tampil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ukuran Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
        		    <form method="post" action="{{ route('ukuran-bahan.update', $tampil->id) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="select2" class="form-label">Tipe Produk</label>
                            <select class="form-control" name="produk_id" required>
                                <option>-- Pilih Tipe Produk --</option>
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
                            <label for="input3" class="form-label">Nama Ukuran Bahan</label>
                            <input type="text" class="form-control" name="nm_ukuran_bahan" id="input3" value="{{ $tampil->nm_ukuran_bahan }}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="input6" class="form-label">Minimal Range</label>
                            <input type="number" class="form-control" name="range_min" step="0.01" min="0" value="{{ number_format($tampil->range_min, 2) }}" id="input_kn" placeholder="x.01" required>
                        </div>
                    </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="input6" class="form-label">Maximal Range</label>
                                <input type="number" class="form-control" name="range_max" step="0.01" min="{{ number_format($tampil->range_max, 2) }}" value="{{ number_format($tampil->range_max, 2) }}" id="input_kn" placeholder="x.99" required>
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