<!-- Start Sidabar -->
<div class="sidebar clearfix">
    <ul class="sidebar-panel nav metismenu" id="side-menu" data-plugin="metismenu">
        @if(Auth::user()->role == 1)
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><span class="icon color5"><i class="fa fa-home" aria-hidden="true"></i></span><span class="nav-title">Dashboard</span></a>
        </li>
        <li><a href="#"><span class="icon color10"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>Master Data <i class="fa fa-sort-desc caret"></i></a>
            <ul>
                <li><a href="{{ route('supplier.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Supplier</a></li>
                <li><a href="{{ route('barang.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Bahan</a></li>
                <li><a href="{{ route('ukuran-bahan.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Ukuran Bahan</a></li>
                <li><a href="{{ route('member.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Member</a></li>
                <li><a href="{{ route('pelanggan.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Costumer</a></li>
                <li><a href="{{ route('kaki.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Kaki</a></li>
                <li><a href="{{ route('editor.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Finishing</a></li>
                <li><a href="{{ route('harga.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Harga</a></li>
                <li><a href="{{ route('pengguna.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Pengguna</a></li>
            </ul>
        </li> 
        <li><a href="#"><span class="icon color5"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="nav-title">Transaksi</span><i class="fa fa-sort-desc caret"></i></a>
           <ul>
            <li><a href="{{ route('order.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Order Kerja</a></li>
            <li><a href="{{ route('order.transaksi') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Transaksi Order</a></li>
            <li><a href="{{ route('order.invoice') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Invoice</a></li>
            <li><a href="{{ route('produksi.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Produksi</a></li>
        </ul>
    </li>
</li>
<li><a href="#"><span class="icon color5"><i class="fa fa-list" aria-hidden="true"></i></span><span class="nav-title">Laporan</span><i class="fa fa-sort-desc caret"></i></a>
   <ul>
    <li><a href="{{ route('laporan.costumer') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Costumer</a></li>
    <li><a href="{{ route('laporan.transaksi') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Transaksi</a></li>
</ul>
</li>
@elseif(Auth::user()->role == 5)
<li class="active"><a href="{{ url('/admin/dashboard') }}"><span class="icon color5"><i class="fa fa-home" aria-hidden="true"></i></span><span class="nav-title">Dashboard</span></a>
</li>
@elseif(Auth::user()->role == 6 || Auth::user()->role == 7 || Auth::user()->role == 8 || Auth::user()->role == 9 || Auth::user()->role == 10)
<li><a href="#"><span class="icon color5"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="nav-title">Produksi</span><i class="fa fa-sort-desc caret"></i></a>
   <ul>
    <li><a href="{{ route('produksi.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Produksi</a></li>
    <li><a href="{{ route('produksi.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Jejak Produksi</a></li>
</ul>
</li>
@elseif(Auth::user()->role == 3)
<li><a href="#"><span class="icon color5"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="nav-title">Transaksi</span><i class="fa fa-sort-desc caret"></i></a>
    <ul>
     <li><a href="{{ route('order.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Order Kerja</a></li>
 </ul>
@elseif(Auth::user()->role == 2)
<li><a href="#"><span class="icon color10"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>Master Data <i class="fa fa-sort-desc caret"></i></a>
    <ul>
        <li><a href="{{ route('pelanggan.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Data Costumer</a></li>
    </ul>
</li> 
<li><a href="#"><span class="icon color5"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="nav-title">Transaksi</span><i class="fa fa-sort-desc caret"></i></a>
   <ul>
    <li><a href="{{ route('order.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Order Kerja</a></li>
</ul>
</li>
@endif
<li><a href="#"><span class="icon color5"><i class="fa fa-gear" aria-hidden="true"></i></span><span class="nav-title">Pengaturan</span><i class="fa fa-sort-desc caret"></i></a>
   <ul>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}</form>
    </li>
</ul>
</li>
</ul>
</div>
                        <!-- End Sidabar -->