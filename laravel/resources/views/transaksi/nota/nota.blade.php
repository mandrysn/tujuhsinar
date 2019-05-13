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
</head>

<body >
    <header>
        <table cellspacing="0" cellpadding="1">
            <tr>
                <td width="40%" colspan="5" align="left" valign="top">
                <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                Nama Costumer : {{ $order->pelanggan->nama }} [{{ $order->pelanggan->member->nm_tipe }}]<br />
                Alamat : {{ $order->pelanggan->alamat }}<br />
                No hp : {{ $order->pelanggan->no_telp }} <br />
                </td>
                <td width="30%" colspan="5" align="left" valign="top">
                    <br ><br />
                NOTA ORDER<br />
                NO Costumer : {{ Helper::idMember($order->pelanggan->id) }}<br />
                TANGGAL : {{ Helper::tanggalId($order->tanggal) }}
                </td>
                <td width="15%">
                    <br /><br />
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($order->order, 'CODABAR') }}" height="30" width="110">
                </td>
            </tr>
            <tr>
                <td rowspan="2">&nbsp;</td>
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
            <tr><th colspan="5" align="left">Bahan / Keterangan Tambahan</th></tr>
            <tr> 
                <td  width="5%" align="center">
                    Qty
                </td>
                <td  width="10%" class="border-left" align="center">
                    Tipe Produk
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
            <tr>
                <td colspan="5" valign="top">
                    {{ $index + 1 }}.&nbsp;{{ $datas->barang->nm_barang }} {{ str_replace("<br />", " / ", $datas->keterangan_sub) }}
                </td>
            </tr>
            <tr>
                <td  width="5%" align="center" valign="top">
                    <strong>{{ $datas->qty }}</strong>
                </td>
                <td width="10%" align="center" valign="top">
                    <strong>{{ $datas->nama_produk }}</strong>
                </td>
                <td width="15%" align="center" valign="top">
                    <strong>{{ number_format($datas->barang->hrg_beli) }}</strong>
                </td>
                <td  width="12%" align="right" valign="top">
                    <strong>{{ number_format($datas->total) }}</strong>
                </td>
            </tr>
            @empty
            @endforelse

        </table>

        <table class="table-foot" width="100%">
            <tr>
                <td colspan="5" align="left" width="71%">
                    Pembayaran {{ $order->status_payment }}. {{ str_replace("<br />", ". ", $order->keterangan) }}
                </td>
                <td class="border-left" align="right">
                    {{ number_format($totalan->total) }}
                </td>
            </tr>
        </table>
        </div>
    </main>

    <footer>
        <table width="100%" >
            <tr>
                <td width="75%" align="left" valign="top">
                    Catatan :<br />
                    1.  Periksa Kembali File Sebelum Cetak, Kesalahan Setelah Cetak Bukan tanggung jawab Management Toedjoe Sinar Group <br />
                    2. Wajib DP min 50% dari Total Biaya Cetak <br />
                    3. 1 (SATU) bulan barang tidak diambil, bukan tanggung jawab management Toedjoe Sinar Group<br />
                    4. Pembayaran dianggap SAH apabila menunjukkan bukti transfer.
                </td>
                <td width="10%" align="left" valign="top">
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

</body>

</html>