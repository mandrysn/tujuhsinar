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
    <?php 
            $start = 0;
            $end = 6;
            $totalHalaman = ceil(count($data)/6);
        for($i = 0;$i < $totalHalaman; $i++){
        ?>
    <header>
        <table cellspacing="0" cellpadding="1">
            <tr>
                <td width="42%" >
                    <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                    <br>
                    Jl. KH Wahid Hasyim 1 No.32 <br>
                    Samarinda - Kaltim<br>
                    Hp/WA : 0821 4995 2015<br>
                    toedjoesinargroup@gmail.com
                </td>
                
                <td width="20%"  style="text-align: center;">
                    <br>
                    <br>
                    <h3>NOTA SURAT JALAN </h3>
                    <hr>
                    No. Surat Jalan {{ $order->order }}
                     
                </td>
                
				<td width="10%">
				</td>
                <td width="60%" align="left" valign="top">
                    
                    <br >
                    <h2>Kepada Yth</h2>
                    <strong>{{ $order->pelanggan->nama }} </strong><br>
                    Hp/Telp : {{ $order->pelanggan->no_telp }} <br><br>
                    
                    Tgl. order : {{ Helper::onlyDate($order->tanggal) }}
                
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    &nbsp;
                </td>
            </tr>
        </table>
    </header>

    <main>
        <div class="main">
        <table class="table-header" width="100%">
            
            <tr> 
                <th width="5%" align="center">
                    No
                </th>
                <th  width="40%" class="border-left" align="center">
                    Keterangan
                </th>
                <td  width="13%" class="border-left" align="center">
                    Nama Bahan
                </th>
                <th  width="7%" class="border-left" align="center">
                    Qty
                </th>
                <th  width="10%" class="border-left" align="center">
                    Ukuran
                </th>
                
            </tr>
        </table>
        
        <table class="table-list" width="100%">

            @forelse($data as $index => $datas)
                @if(($index+1) > $start && $index < $end)
                    <tr>
                        <td width="5%" valign="top">
                            {{ $index + 1 }}.&nbsp;
                        </td>
                        <td width="40%" align="center" valign="top">
                            {!! Helper::keteranganSatuBaris($datas->keterangan_sub) !!}
                        </td>
                        <td  width="13%" align="center" valign="top">
                            {{ $datas->barang->nm_barang }}
                        </td>
                        <td width="7%" align="center" valign="top">
                            {{ $datas->qty }} pcs
                        </td>
                        <td width="10%" align="center" valign="top">
                            {!! Helper::getUkuran($datas->keterangan_sub) !!}
                        </td>
                        
                        
                    </tr>
                @endif
            @empty
            @endforelse

        </table>

        <table  width="87%">
<tr>

					<td width="20%" align="left" valign="top">
					
					</td>
					<td width="15%"  align="center" valign="top">
					Hormat Kami<br /><br /><br /><br /><br />
					<hr />
					</td>
					<td width="25%">
					</td>
					<td width="15%" align="center" valign="top">
					Tanda Terima<br /><br /><br /><br /><br />
					<hr />
					</td>
				</tr>
				</table>
        </div>
    </main>
<div class="page-break"></div>
        <?php  $start += 6;$end += 6; ?>
    <?php  } ?>

</body>

</html>