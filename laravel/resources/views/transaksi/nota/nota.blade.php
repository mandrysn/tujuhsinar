<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NOTA KASIR TUJUH SINAR">
    <meta name="author" content="MAndrySN.GreenNusa">
    <link href="{{ asset('css/styles_cetak.css') }}" rel="stylesheet" type="text/css">
    <title>NOTA KASIR TUJUH SINAR</title>
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
    <?php $start = 0; ?>
    <?php $end = 3; ?>
    <?php $totalHalaman = count($data)/3; ?>
    <?php for ($i=0; $i < $totalHalaman; $i++): ?>
        <header>
            <table cellspacing="0" cellpadding="1">
                <tr>
                    <td width="40%" colspan="5" align="left" valign="top">
                    <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                    <br>
                    Jln.KH Wahid hasyim 1 No.32 <br>
                    Samarinda - Kaltim<br>
                    Hp/WA : 0821 4995 2015<br>
                    toedjoesinargroup@gmail.com
                    </td>
                    <td width="15%" style="text-align: center;">
                        <br>
                        <br>
                        Nota Penjualan
                        <hr>
                        No.Invoice {{ $order->order }}
                    </td>
                    <td width="15%">
                        <br /><br />

                    </td>
                    <td width="5%" >
                        
                    </td>
                    <td width="60%" colspan="5" align="left" valign="top">
                        <br >
                        <h2>Kepada Yth</h2>
                        <strong>{{ $order->pelanggan->nama }} </strong><br>
                        Hp/Telp : {{ $order->pelanggan->no_telp }} <br><br>
                        
                        Tgl. order : {{ Helper::tanggalId($order->tanggal) }}
                    
                    </td>
                    
                </tr>
                <tr>
                    <td width="40%">

                    </td>
                    <td rowspan="2" > 
                        
                    </td>
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
            <div class="main">
            <table class="table-header" width="100%">
                <tr><th colspan="5" align="left">Bahan</th></tr>
                <tr> 
                    <td  width="5%" align="center">
                        Qty
                    </td>
                 
                    <td  width="10%" class="border-left" align="center">
                        Ukuran
                    </td>

                    <td  width="15%" class="border-left" align="center">
                        Harga Satuan
                    </td>
                    <td  width="12%" class="border-left" align="right">
                        Total
                    </td>
                </tr>
            </table>
            
            <table class="table-list" width="100%">
                
                @forelse($data as $index => $datas)
                    @if(($index+1) > $start && $index < $end)
                        <?php 
                            $ket = str_replace(", Ukuran:".Helper::getUkuran($datas->keterangan_sub), ' ', Helper::keteranganSatuBaris($datas->keterangan_sub));
                         ?>
                        <tr>
                            <td colspan="5" valign="top">
                                {{ $index + 1 }}.&nbsp;{{ $datas->Barang->nm_barang }} ({{ $ket }})
                            </td>
                        </tr>
                        <tr>
                            <td  width="5%" align="center" valign="top">
                                <strong>{{ $datas->qty }}</strong>
                            </td>
                            
                            <td width="10%" align="center" valign="top">
                                <strong>{{ Helper::getUkuran($datas->keterangan_sub) }}</strong>
                            </td>
                            <td width="15%" align="center" valign="top">
                                <strong>{{ number_format($datas->harga) }}</strong>
                            </td>
                            <td  width="12%" align="right" valign="top">
                                <strong>{{ number_format($datas->total) }}</strong>
                            </td>
                        </tr>
                    @endif
                @empty
                @endforelse

            </table>

            <table  width="100%">
                <?php 
                    $arr = explode('<br />', $order->keterangan);
                    
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
                        <strong>Type bayar : {{@$arr[0]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        1.  Periksa Kembali File Sebelum Cetak, Kesalahan Setelah Cetak Bukan tanggung jawab Management Toedjoe Sinar Group 
                        
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{@$arr[1]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        2. Wajib DP min 50% dari Total Biaya Cetak
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{@$arr[2]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        3. 1 (SATU) bulan barang tidak diambil, bukan tanggung jawab management Toedjoe Sinar Group
                        
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{@$arr[3]}}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="5" align="left" width="71%">
                        4. Pembayaran dianggap SAH apabila menunjukkan bukti transfer.
                    </td>
                    <td class="border-bottom" align="left">
                        <strong>{{@$arr[4]}}</strong>
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
                    Hormat Kami<br /><br /><br /><br />
                    {{ Auth::user()->nama }}
                    </td>
                    <td width="10%" align="left" valign="top">
                    Tanda Terima<br /><br /><br /><br />
                    {{ $order->pelanggan->nama }}
                    </td>
                </tr>
            </table>
        </footer>
        <?php $start += 3; ?>
        <?php $end += 3; ?>
        <div class="page-break"></div>
    <?php endfor; ?>
</body>

</html>