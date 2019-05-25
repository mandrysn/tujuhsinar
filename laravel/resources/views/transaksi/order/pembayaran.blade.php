<div class="modal fade" id="edit-data{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Method Pembayaran</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($data,
                    ['method' => 'PATCH',
                        'action' => ['OrderKerjaController@storePayment', $id],
                        'files' => 'true']) !!}

                        {!! csrf_field() !!}
                        <input type="hidden" id="total_bayar" value="{{ $totalan->total }}" />
                    
                        <div class="form-group">
                            <label for="example3" class="form-label">Total Pembayaran</label>
                            <input type="text" name="total" value="{{ number_format($totalan->total) }}" class="form-control form-control-line" disabled>
                        </div>

                    <div class="form-group">
                        <select name="type_pembayaran" class="form-control form-control-line" id="type_pembayaran">
                            <option>Pilih</option>
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>
                            <option value="invoice">Invoice</option>
                            <option value="down payment">Down Payment</option>
                        </select>
                    </div>

                    <div class="panel-body" id="form_pembayaran_tunai">
                        
                        <div class="form-group">
                            <label for="example3" class="form-label">Jumlah bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control form-control-line" id="jumlah_bayar" onchange="kembaliannya()">
                        </div>

                        <div class="form-group">
                            <label for="example3" class="form-label">Kembalian</label>
                            <input type="text" name="kembalian" class="form-control form-control-line" id="kembalian" value="0" disabled>
                        </div>
                    </div>

                    <div class="panel-body" id="form_pembayaran_transfer">
                        <div class="form-group">
                            <label for="example3" class="form-label">Bukti Transfer</label>
                            <input type="file" name="bukti_transfer" class="form-control form-control-line" id="example3">
                        </div>
                        
                    </div>
        
                    <div class="panel-body" id="form_pembayaran_invoice">
                        <div class="form-group">
                            <label for="example3" class="form-label">Jumlah bayar</label>
                            <input type="text" name="jumlah_invoice" class="form-control form-control-line">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control form-control-line" id="example5">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control form-control-line" id="example5">
                        </div>
                    </div>

                    <div class="panel-body" id="form_pembayaran_dp">
                        <div class="form-group">
                            <label class="form-label">Jumlah DP</label>
                            <input type="text" name="jumlah_dp" class="form-control form-control-line" id="jumlah_dp" onchange="dp()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Sisa Pembayaran</label>
                            <input type="text" name="sisa_dp" class="form-control form-control-line" id="sisa_dp" value="0" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                    
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('bayar')
<script>

    $(document).on("change", "#type_pembayaran", function(e) {
        $("#jumlah_bayar").val('');
        $("#kembalian").val('');
        $("#jumlah_dp").val('');
        $("#sisa_dp").val('');
    });

    function kembaliannya() {
        var jb = $("#jumlah_bayar").val();
        var tb = $("#total_bayar").val();
        if(tb > jb ) {
            $("#kembalian").val('pembayaran kurang');
        } else if(jb == tb ) {
            $("#kembalian").val(jb - tb)
        } else {
            $("#kembalian").val(tb - jb);
        }
    }

$( document ).ready(function() {

    $("#form_pembayaran_tunai").hide();
    $("#form_pembayaran_transfer").hide();
    $("#form_pembayaran_invoice").hide();
    $("#form_pembayaran_dp").hide();
    
    $(document).on("change", "#type_pembayaran", function(e) {

        if ($(this).val() == "tunai") {
            $("#form_pembayaran_tunai").show();
            $("#form_pembayaran_transfer").hide();
            $("#form_pembayaran_invoice").hide();
            $("#form_pembayaran_dp").hide();
        }
        else if ($(this).val() == "transfer") {
            $("#form_pembayaran_tunai").hide();
            $("#form_pembayaran_transfer").show();
            $("#form_pembayaran_invoice").hide();
            $("#form_pembayaran_dp").hide();
        }
        else if ($(this).val() == "invoice") {
            $("#form_pembayaran_tunai").hide();
            $("#form_pembayaran_transfer").hide();
            $("#form_pembayaran_invoice").show();
            $("#form_pembayaran_dp").hide();
        }
        else if ($(this).val() == "down payment") {
            $("#form_pembayaran_tunai").hide();
            $("#form_pembayaran_transfer").hide();
            $("#form_pembayaran_invoice").hide();
            $("#form_pembayaran_dp").show();
        }
    });
});

    function dp() {
        var dp = $("#jumlah_dp").val();
        var b = $("#total_bayar").val();
        if (b > dp) {
            $("#sisa_dp").val('pembayaran dp kelebihan.');
        } else {
            $("#sisa_dp").val(b-dp);
        }
    }
</script>
@endpush