<div class="col-md-5">
    <div class="panel panel-default">
        <div class="panel-title"> Data Order
            <ul class="panel-tools">
               <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
               <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
               <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
           </ul>
       </div>
       <div class="panel-body">
        <table class="table display">
            <tr>
                <td>No Order </td>
                <td><b>{{$order->order}}</b></td>
            </tr>
            <tr>
                <td>Customer </td>
                <td><b>{{$order->pelanggan->nama}}</b></td>
            </tr>
            <tr>
                <td>Tanggal Order</td>
                <td><b>{{substr($order->tanggal,0,10)}}</b></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><b>
                    @if ($order->status_produksi == '1')
                    Order
                    @elseif ($order->status_produksi == '2')
                    Selesai
                    @else
                    Cancel
                    @endif
                </b></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="{{ route('piutang.index') }}" class="btn btn-default">Kembali</a>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>