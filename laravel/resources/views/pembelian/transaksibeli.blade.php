<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-title"> Pilih Barang
            <ul class="panel-tools">
               <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
               <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
               <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
            </ul>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('tmpbeli.store') }}">
               {!! csrf_field() !!}
               <div class="form-group">
                <label for="input1" class="form-label">Pilih Barang</label>
                <select class="selectpicker form-control anu" name="barang" id="input1" data-live-search="true" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $jn)
                    <option value="{{$jn->id}}">{{$jn->nm_barang}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="input3" class="form-label">Harga Barang</label>
                <input type="number" name="harga" min="1" id="input3" class="form-control">
            </div>
            <div class="form-group">
                <label for="input4" class="form-label">Jumlah</label>
                <input type="number" name="qty" min="1" id="input4" class="form-control" required>
            </div>
            <div align="right">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $("select.anu").change(function(){
        var _this = $(this).children("option:selected");
        var _url  = 'harga/' + _this.val();
        $.get(_url, function(data){
            $('#input3').val(data);
        });
    });
});

</script>