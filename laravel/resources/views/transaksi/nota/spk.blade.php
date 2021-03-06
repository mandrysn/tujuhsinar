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
                <td  width="40%">
                    <span style="font-size: 24px">Toedjoe Sinar Group</span><br />
                    <br>
                    Jl. KH Wahid Hasyim 1 No.32 <br>
                    Samarinda - Kaltim<br>
                    Hp/WA : 0821 4995 2015<br>
                    toedjoesinargroup@gmail.com
                </td>
                
                <td width="20%" style="text-align: center;">
                    <br>
                    <br>
                    <h3>NOTA SPK </h3>
					<hr>
                    No.SPK {{ $order->order }}
                    
                    
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
            
           
        </table>
    </header>

    <main>
        

            <h1>{{ $dg->nama_produk }}</h1>
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

            <table  width="100%"  >
                <?php 
                    $arr = explode('<br />',$order->keterangan);
                    
                 ?>
                
                 <style type="text/css">
                     .border-bottom {
                        border-bottom: 1px solid black;
                     }
                 </style>


                <tr>
                    <td rowspan="3" style="font-size: 10px" valign="top" align="left" width="50%">
                        Catatan :
                        
                        
                    </td>
                </tr>
				
				<tr>
					<td width="30%" align="left" valign="top">
					 Kasir<br /><br /><br /><br /><br />
					ADMIN
					</td>
					<td width="20%" align="left" valign="top">
					Pj Produksi<br /><br /><br /><br /><br />
					<hr />
					</td>
					<td width="10%" align="left" valign="top">
					
					</td>
				</tr>

                
            </table>
            </div>
            
            
    </main>

 
@if($nama_produk != $dg->nama_produk)
                <?php $nama_produk = $dg->nama_produk; ?>
                <div class="page-break"></div>
            @endif
        @endforeach
</body>

</html>