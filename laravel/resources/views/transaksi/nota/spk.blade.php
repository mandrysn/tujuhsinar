<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NOTA KASIR TUJUH SINAR">
    <meta name="author" content="MAndrySN.GreenNusa">
    <link href="{{ asset('css/styles_cetak.css') }}" rel="stylesheet" type="text/css">
    <title>SURAT JALAN TUJUH SINAR</title>
    <script type="text/javascript">
        
        window.print();

    </script>
    <style type="text/css">
        @media all {
        .page-break { display: none; }
        }

        @media print {
        .page-break { display: block; page-break-before: always; }
        }
    </style>
</head>

<body >
    <?php $nama_produk = "Indoor"; ?>
        @foreach($dataGroup as $dg)
    <header>
        <table cellspacing="0" cellpadding="1">
            <tr>
                <td width="40%" colspan="5" align="left" valign="top">
                <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                <br>
                M Yamin
                </td>
                
                
                <td width="10%">
                    <br /><br />
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($order->order, 'CODABAR') }}" height="30" width="110">
                </td>
                <td width="5%"></td>
                <td width="60%" colspan="5" align="left" valign="top">
                    
                    <br ><br />
                    No. Invoice/Nota : {{ $order->order }} <br>
                    Kepada Yth <br>
                    {{ $order->pelanggan->nama }} <br>
                    Telp : {{ $order->pelanggan->no_telp }} <br>
                    
                    Tanggal pemesanan : {{ Helper::tanggalId($order->tanggal) }}
                
                </td>
                
            </tr>
            
            <tr>
                <td width="40%" ></td>
                <td rowspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: center;"><h1>NOTA SURAT JALAN </h1></td>
            </tr>
            <tr>
                <td colspan="5" align="left" valign="top">
                &nbsp;
                </td>
                <td colspan="5" align="left" valign="top">
                    &nbsp;
                </td>
            </tr>
        </table>
    </header>

    <main>
        

            <h1>{{ $dg->nama_produk }}</h1>
            <div class="main">
            <table class="table-header" width="100%">
                <tr><th colspan="5" align="left">Bahan</th></tr>
                <tr> 
                    <td  width="5%" align="center">
                        No
                    </td>
                    <td  width="20%" class="border-left" align="center">
                        Nama File
                    </td>
                    <td  width="10%" class="border-left" align="center">
                        Qty
                    </td>
                    <td  width="20%" class="border-left" align="center">
                        Ukuran
                    </td>
                    <td  width="20%" class="border-left" align="center">
                        Keterangan
                    </td>
                </tr>
            </table>
            
            <table class="table-list" width="100%">

                @forelse($data as $index => $datas)
                    @if($datas->produk_id == $dg->produk_id)
                        <tr>
                            <td width="5%" valign="top">
                                {{ $index + 1 }}.&nbsp;
                            </td>
                            <td  width="20%" align="center" valign="top">
                                {{ $datas->barang->nm_barang }}
                            </td>
                            <td width="10%" align="center" valign="top">
                                <strong>{{ $datas->qty }}</strong>
                            </td>
                            <td width="20%" align="center" valign="top">
                                <strong>{{ Helper::getUkuran($datas->keterangan_sub) }}</strong>
                            </td>
                            <td width="20%" align="center" valign="top">
                                <strong>{{ Helper::keteranganSatuBaris($datas->keterangan_sub) }}</strong>
                            </td>
                            
                        </tr>
                    @endif
                @empty
                @endforelse

            </table>

            <table  width="100%">
                <?php 
                    $arr = explode('<br />',$order->keterangan);
                    
                 ?>
                
                 <style type="text/css">
                     .border-bottom {
                        border-bottom: 1px solid black;
                     }
                 </style>


                <tr>
                    <td colspan="5" align="left" width="71%">
                        Catatan :
                        
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>Type bayar : {{$arr[0]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        1.  Periksa Kembali File Sebelum Cetak, Kesalahan Setelah Cetak Bukan tanggung jawab Management Toedjoe Sinar Group 
                        
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{$arr[1]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        2. Wajib DP min 50% dari Total Biaya Cetak
                        
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{$arr[2]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        3. 1 (SATU) bulan barang tidak diambil, bukan tanggung jawab management Toedjoe Sinar Group
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{$arr[3]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        4. Pembayaran dianggap SAH apabila menunjukkan bukti transfer.
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{$arr[4]}}</strong>
                    </td>
                </tr>
                
            </table>
            </div>
            
            
    </main>

    <footer>
        <table width="100%" >
            <tr>
                <td width="60%" align="left" valign="top">
                    
                </td>
                <td width="20%" align="left" valign="top">
                Kasir<br />
                Tanggal:<br /><br /><br />
                ADMIN
                </td>
                <td width="10%" align="left" valign="top">
                Penerima<br />
                Tanggal:<br /><br /><br />
                Nama jelas:
                </td>
            </tr>
        </table>
    </footer>
@if($nama_produk != $dg->nama_produk)
                <?php $nama_produk = $dg->nama_produk; ?>
                <div class="page-break"></div>
            @endif
        @endforeach
</body>

</html>