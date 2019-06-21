{!! Form::model($data,
                        [   'method' => 'PATCH',
                            'action' => ['OrderKerjaController@storePayment', $id],
                            'files' => 'true',
                            'target'=>'_blank'
                            ]) !!}

                            {!! csrf_field() !!}
                            <input type="hidden" id="total_bayar" value="{{ $totalan->total }}" />
                            <h1>Total Pembayaran</h1>
                            <div class="form-group">
                                <label for="total" class="form-label">Harga Asli</label>
                                <input type="text" id="total" name="total" value="{{ number_format($totalan->total) }}" class="form-control form-control-line" disabled>
                            </div>

                            <div class="form-group">
                                <label for="diskon" class="form-label">diskon</label>
                                <input type="text"  id="diskon" name="diskon" value="0" class="form-control form-control-line">
                            </div>

                            <div class="form-group">
                                <label for="total2" class="form-label">Harga Akhir</label>
                                <input type="text" id="total2" name="total2" value="{{ number_format($totalan->total) }}" class="form-control form-control-line" disabled>
                                <input type="hidden" id="total_akhir" name="total_akhir" value="{{ number_format($totalan->total) }}" >
                            </div>

                        <div class="form-group">
                            <select name="type_pembayaran" class="form-control form-control-line" id="type_pembayaran">
                                <option disabled selected="">Pilih Type Pembayaran</option>
                                <option value="tunai">Tunai</option>
                                <option value="transfer">Transfer</option>
                                <option value="invoice">Invoice</option>
                                <option value="down payment">Down Payment</option>
                            </select>
                        </div>

                        <div class="panel-body" id="form_pembayaran_tunai">
                            
                            <div class="form-group">
                                <label for="jumlah_bayar" class="form-label">Jumlah bayar</label>
                                <input type="text" name="jumlah_bayar" value="0" class="form-control form-control-line" id="jumlah_bayar" onchange="kembaliannya()">
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
                                <input type="text" name="jumlah_dp" value="0" class="form-control form-control-line" id="jumlah_dp" onchange="dp()">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sisa Pembayaran</label>
                                <input type="text" name="sisa_dp" class="form-control form-control-line" id="sisa_dp" value="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <button type="submit" class="btn btn-primary" 
                            onclick="
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                            ">Bayar</button>
                        </div>
                        
                    {!! Form::close() !!}

@push('bayar')
<script>

    $(document).on("change", "#type_pembayaran", function(e) {
        $("#jumlah_bayar").val(0);
        $("#kembalian").val(0);
        $("#jumlah_dp").val(0);
        $("#sisa_dp").val(0);
    });

    function kembaliannya() {
        var jb = parseInt($("#jumlah_bayar").val());
        var tb = parseInt($("#total_akhir").val());
        if(tb > jb ) {
            $("#kembalian").val('pembayaran kurang');
        } else if(jb == tb ) {
            $("#kembalian").val(jb - tb)
        } else {
            $("#kembalian").val(tb - jb);
        }
    }

$( document ).ready(function() {
    $(document).on("change", "#diskon", function(e) {
        var total_akhir = parseInt($("#total_bayar").val()) - (parseInt($("#total_bayar").val()) * (parseInt($("#diskon").val())/100));
        $('#total2').val(total_akhir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#total_akhir").val(total_akhir);
        kembaliannya();
        dp();
    });
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
        var dp = parseInt($("#jumlah_dp").val());
        var b = parseInt($("#total_akhir").val());
        console.log(b < dp);

        if (b < dp) {
            $("#sisa_dp").val('pembayaran dp kelebihan.');
        } else {
            $("#sisa_dp").val(b-dp);
        }
    }



    
</script>
@endpush