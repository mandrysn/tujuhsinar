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
        window.open("{{ route('order.print', $order->id) }}");
        window.print();

    </script>
</head>

<body >
    <header>
        <table cellspacing="0" cellpadding="1">
            <tr>
                <td width="40%" >
                    <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                    <br>
                    Jl. KH Wahid Hasyim 1 No.32 <br>
                    Samarinda - Kaltim<br>
                    Hp/WA : 0821 4995 2015<br>
                    toedjoesinargroup@gmail.com
                </td>
                
                <td width="20%"  style="text-align: left;">
                    <br>
                    <br>
                    <h3>NOTA SURAT JALAN </h3>
                    <hr>
                    No. Surat Jalan {{ $order->order }}
                     
                </td>
                
				<td colspan="2">
				</td>
                <td width="30%" colspan="5" align="left" valign="top">
                    
                    <br >
                    <h2>Kepada Yth</h2>
                    <strong>{{ $order->pelanggan->nama }} </strong><br>
                    Hp/Telp : {{ $order->pelanggan->no_telp }} <br><br>
                    
                    Tgl. order : {{ Helper::tanggalId($order->tanggal) }}
                
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <br>
                </td>
            </tr>
        </table>
    </header>

    <main>
        <div class="main">
        <table class="table-header" width="100%">
            
            <tr> 
                <td  width="5%" align="center">
                    No
                </td>
                <td  width="45%" class="border-left" align="center">
                    Keterangan
                </td>
                <td  width="10%" class="border-left" align="center">
                    Nama Bahan
                </td>
                <td  width="5%" class="border-left" align="center">
                    Qty
                </td>
                <td  width="10%" class="border-left" align="center">
                    Ukuran
                </td>
                
            </tr>
        </table>
        
        <table class="table-list" width="100%">

            @forelse($data as $index => $datas)
        
            <tr>
                <td width="5%" valign="top">
                    {{ $index + 1 }}.&nbsp;
                </td>
                <td width="45%" align="center" valign="top">
                    <strong>{{ Helper::keteranganSatuBaris($datas->keterangan_sub) }}</strong>
                </td>
                <td  width="10%" align="center" valign="top">
                    {{ $datas->barang->nm_barang }}
                </td>
                <td width="5%" align="center" valign="top">
                    <strong>{{ $datas->qty }} pcs</strong>
                </td>
                <td width="10%" align="center" valign="top">
                    <strong>{{ Helper::getUkuran($datas->keterangan_sub) }}</strong>
                </td>
                
                
            </tr>
            @empty
            @endforelse

        </table>

        <table  width="80%">
<tr>

					<td width="20%" align="left" valign="top">
					
					</td>
					<td width="15%"  align="left" valign="top">
					Hormat Kami<br /><br /><br /><br /><br />
					<hr />
					</td>
					<td width="30%">
					</td>
					<td width="15%" align="left" valign="top">
					Tanda Terima<br /><br /><br /><br /><br />
					<hr />
					</td>
				</tr>
				</table>
        </div>
    </main>


</body>

</html>