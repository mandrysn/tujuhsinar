<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//api
	Route::group(['prefix' => 'api'], function() {
		Route::get('/data_order', 'OrderKerjaController@load_data');
		Route::get('/data_supplier', 'SupplierController@load_data');
		Route::get('/data_member', 'MemberController@load_data');
	});


Route::get('', function ()
{
	return redirect('admin');
})->name('antrian');
Route::get('antrian/cetak', 'AntrianController@AntrianUser')->name('antrian.cetak');
Route::get('antrian/konfirmasi/{id}', 'AntrianController@konfirmasi')->name('antrian.konfirmasi');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {

	Route::get('/', 'Dashboard@cek');
	Route::group(['middleware' => 'owner'], function() {
		Route::get('/dashboard', 'Dashboard@index')->name('dash');
	});

	Route::group(['prefix' => 'master'], function() {
			Route::resource('/kaki', 'KakiController');
			Route::resource('/barang', 'BarangController');
			Route::resource('/editor', 'EditorController');

		Route::group(['middleware' => 'order'], function() {
			Route::resource('/pelanggan', 'PelangganController');

		});
	});

	Route::group(['prefix' => 'transaksi'], function() {

		Route::group(['prefix' => 'antrian'], function() {
			Route::get('', 'AntrianController@index');
			Route::delete('hapus/{id}', 'OrderKerjaController@destroy')->name('antrian.destroy');
			Route::resource('antrian', 'AntrianController');
		});

		Route::group(['prefix' => 'order', 'middleware' => 'auth'], function() {
			Route::get('cancel', 'OrderKerjaController@lihatCancel')->name('order.cancel.view');
			Route::get('cancel/{id}', 'OrderKerjaController@cancel')->name('order.cancel');
			Route::post('tambah/{id}', 'OrderKerjaController@detail')->name('order.detail');
			Route::get('transaksi', 'OrderKerjaController@transaksi')->name('order.transaksi');
			Route::delete('hapus/{id}', 'OrderKerjaController@destroySubKerja')->name('order.subkerja.hapus');

			Route::group(['prefix' => 'invoice'], function() {
				Route::get('', 'PiutangController@index')->name('order.invoice');
			});

			Route::group(['prefix' => 'outdoor'], function() {
				Route::get('kaki', 'HargaOutdoorController@getKaki');
				Route::get('finishing', 'HargaOutdoorController@getFinishing');
				Route::get('data/{barang}/{pelanggan}/{qty}/{p}/{l}', 'HargaOutdoorController@getData');
			});

			Route::group(['prefix' => 'indoor'], function() {
				Route::get('kaki', 'HargaIndoorController@getKaki');
				Route::get('finishing', 'HargaIndoorController@getFinishing');
				Route::get('data/{barang}/{pelanggan}/{qty}/{p}/{l}', 'HargaIndoorController@getData');
				
			});

			Route::group(['prefix' => 'merchant'], function() {
				Route::get('data/{barang}/{pelanggan}/{qty}/{produk}', 'HargaMerchantController@getData');
				
			});

			Route::group(['prefix' => 'print'], function() {
				Route::get('finishing', 'HargaPrintController@getFinishing');
				Route::get('data/{barang}/{pelanggan}/{qty}/{ukuran}/{tipe_print}', 'HargaPrintController@getData');
				
			});

			Route::group(['prefix' => 'costum'], function() {
				Route::get('data/{nama_produk}/{produk}/{pelanggan}/{qty}', 'HargaCostumController@getData');
				
			});

			Route::group(['prefix' => 'store'], function() {
				Route::post('indoor/', 'OrderKerjaController@storeIndoor')->name('storeIndoor');
				Route::post('outdoor/', 'OrderKerjaController@storeOutdoor')->name('storeOutdoor');
				Route::post('merchant/', 'OrderKerjaController@storemerchant')->name('storeMerchant');
				Route::patch('payment/{id}', 'OrderKerjaController@storePayment')->name('storePayment');
				Route::post('print-quarto/', 'OrderKerjaController@storePrintQuarto')->name('storePrintQuarto');
				Route::post('costum-produk/', 'OrderKerjaController@storeCostumProduk')->name('storeCostumProduk');
			});
			
		});
		Route::resource('/order', 'OrderKerjaController');
		
		Route::group(['prefix' => 'produksi'], function() {

			Route::get('print/{id}', 'OrderKerjaController@print')->name('order.print');
			Route::get('print-spk/{id}', 'OrderKerjaController@print2')->name('order.print-spk');
			Route::get('spk/{id}', 'OrderKerjaController@print3')->name('order.spk');
			Route::get('update_status/{id}', 'ProduksiController@update_status')->name('produksi.update_status');

			Route::group(['middleware' => 'outdoor'], function() {
				Route::get('outdoor', 'ProduksiController@showOutdoor')->name('transaksi.produksi.outdoor');

			});
			
			Route::group(['middleware' => 'indoor'], function() {
				Route::get('indoor', 'ProduksiController@showIndoor')->name('transaksi.produksi.indoor');

			});

			Route::group(['middleware' => 'merchant'], function() {
				Route::get('merchant', 'ProduksiController@showMerchant')->name('transaksi.produksi.merchant');

			});

			Route::group(['middleware' => 'print'], function() {
				Route::get('print', 'ProduksiController@showPrint')->name('transaksi.produksi.print');

			});

			Route::group(['middleware' => 'costum'], function() {
				Route::get('costum', 'ProduksiController@showCostum')->name('transaksi.produksi.costum');

			});
		});

		Route::group(['middleware' => 'admin'], function() {
			Route::resource('produksi', 'ProduksiController');
		});
		
	});

	Route::group(['prefix' => 'keuangan'], function() {
		Route::get('/utang', 'BeliController@utang')->name('utang');
		Route::get('/utang/{id}', 'BeliController@utangbeli')->name('utangbeli');
		
		Route::group(['middleware' => 'kasir'], function(){
			Route::get('update_status/{id}', 'PiutangController@update_status')->name('piutang.update_status');
			Route::resource('/piutang', 'PiutangController');
		});

		Route::get('harga/{id}', 'TmpBeliController@show');
		Route::resource('/pembelian', 'BeliController');
	});


	Route::group(['prefix' => 'laporan'], function() {
		Route::get('/pembelian', 'BeliController@laporan')->name('lapbeli');
		Route::get('/order', 'OrderKerjaController@laporanOrder')->name('laporan.order');

		Route::get('/hari', 'OrderKerjaController@laporanHari')->name('laporan.hari');
		Route::get('/indoor', 'OrderKerjaController@laporanIndoor')->name('laporan.indoor');
		Route::get('/outdoor', 'OrderKerjaController@laporanOutdoor')->name('laporan.outdoor');
		Route::get('/merchandise', 'OrderKerjaController@laporanMerchandise')->name('laporan.merchandise');

		Route::get('/invoice', 'OrderKerjaController@laporanInvoice')->name('laporan.invoice');
		Route::get('/dp', 'OrderKerjaController@laporanDp')->name('laporan.dp');
		Route::get('/tunai', 'OrderKerjaController@laporanTunai')->name('laporan.tunai');

		Route::get('/print', 'OrderKerjaController@laporanPrint')->name('laporan.print');
		Route::get('/costumer', 'PelangganController@laporan')->name('laporan.costumer');
		Route::get('/indoor', 'OrderKerjaController@laporanIndoor')->name('laporan.indoor');
		Route::get('/custom', 'OrderKerjaController@laporanCustom')->name('laporan.custom');
		Route::get('/transaksi', 'OrderKerjaController@laporan')->name('laporan.transaksi');
		Route::get('/outdoor', 'OrderKerjaController@laporanOutdoor')->name('laporan.outdoor');
		Route::get('/merchandise', 'OrderKerjaController@laporanMerchandise')->name('laporan.merchandise');
	
		Route::group(['prefix' => 'detail'], function() {
			Route::post('/order', 'LaporanController@laporanDetailOrder')->name('laporan.detail.order');

			Route::post('/hari', 'LaporanController@laporanDetailHari')->name('laporan.detail.hari');

			Route::post('/print', 'LaporanController@laporanDetailPrint')->name('laporan.detail.print');

			Route::post('/indoor', 'LaporanController@laporanDetailIndoor')->name('laporan.detail.indoor');
			Route::post('/custom', 'LaporanController@laporanDetailCustom')->name('laporan.detail.custom');
			Route::post('/outdoor', 'LaporanController@laporanDetailOutdoor')->name('laporan.detail.outdoor');
			Route::post('/merchandise', 'LaporanController@laporanDetailMerchandise')->name('laporan.detail.merchandise');

			Route::post('/invoice', 'LaporanController@laporanDetailInvoice')->name('laporan.detail.invoice');
			Route::post('/dp', 'LaporanController@laporanDetailDp')->name('laporan.detail.dp');
			Route::post('/tunai', 'LaporanController@laporanDetailTunai')->name('laporan.detail.tunai');

			Route::get('/order', 'LaporanController@laporanDetailOrder')->name('laporan.detail.order');
			Route::get('/print', 'LaporanController@laporanDetailPrint')->name('laporan.detail.print');
			Route::get('/indoor', 'LaporanController@laporanDetailIndoor')->name('laporan.detail.indoor');
			Route::get('/custom', 'LaporanController@laporanDetailCustom')->name('laporan.detail.custom');
			Route::get('/outdoor', 'LaporanController@laporanDetailOutdoor')->name('laporan.detail.outdoor');
			Route::get('/merchandise', 'LaporanController@laporanDetailMerchandise')->name('laporan.detail.merchandise');
		});

		Route::group(['prefix' => 'cetak'], function() {
			Route::get('/beli/{awal}&{akhir}', 'BeliController@cetak')->name('cetbeli');
			Route::get('/detailbeli/{id}', 'BeliController@cetakdetail')->name('cetdetbeli');
			Route::post('/order', 'LaporanController@laporanOrder')->name('laporan.cetak.order');
			Route::post('/print', 'LaporanController@laporanPrint')->name('laporan.cetak.print');
			Route::post('/custom', 'LaporanController@laporanCustom')->name('laporan.cetak.custom');
			Route::post('/indoor', 'LaporanController@laporanIndoor')->name('laporan.cetak.indoor');
			Route::post('/outdoor', 'LaporanController@laporanOutdoor')->name('laporan.cetak.outdoor');
			Route::post('/merchandise', 'LaporanController@laporanMerchandise')->name('laporan.cetak.merchandise');

			Route::post('/invoice', 'LaporanController@laporanInvoice')->name('laporan.cetak.invoice');
			Route::post('/dp', 'LaporanController@laporanDp')->name('laporan.cetak.dp');
			Route::post('/tunai', 'LaporanController@laporanTunai')->name('laporan.cetak.tunai');
			Route::post('/hari', 'LaporanController@laporanHari')->name('laporan.cetak.hari');
		});
	});


	Route::group(['prefix' => 'master', 'middleware' => 'admin'], function() {


		Route::resource('/harga', 'HargaController');
		Route::resource('/member', 'MemberController');
		Route::resource('/supplier', 'SupplierController');
		Route::get('ukuran-bahan/bahan', 'UkuranBahanController@getBahan');
		Route::resource('ukuran-bahan', 'UkuranBahanController');
		Route::post('harga/indoor/', 'HargaController@indoor')->name('harga.indoor');
		Route::post('harga/outdoor/', 'HargaController@outdoor')->name('harga.outdoor');
		Route::post('harga/merchant/', 'HargaController@merchant')->name('harga.merchant');
		Route::post('harga/print-quarto/', 'HargaController@printQuarto')->name('harga.printQuarto');
		Route::post('harga/large-format/', 'HargaController@largeFormat')->name('harga.largeFormat');
		Route::post('harga/indoor/update/', 'HargaController@indoorEdit')->name('harga.indoorUpdate');
		Route::post('harga/costum-produk/', 'HargaController@costumProduk')->name('harga.costumProduk');
		Route::post('harga/outdoor/update/', 'HargaController@outdoorEdit')->name('harga.outdoorUpdate');
		Route::post('/costumer/storeModal', 'PelangganController@storeModal')->name('costumer.storeModal');
		Route::post('harga/merchant/update/', 'HargaController@merchantEdit')->name('harga.merchantUpdate');
		Route::delete('harga/indoor/destroy/{id}', 'HargaController@indoorDestroy')->name('harga.indoorDestroy');
		Route::delete('harga/outdoor/destroy/{id}', 'HargaController@outdoorDestroy')->name('harga.outdoorDestroy');
		Route::post('harga/large-format/update/', 'HargaController@largeFormatEdit')->name('harga.largeFormatUpdate');
		Route::post('harga/print-quarto/update/', 'HargaController@printQuartoEdit')->name('harga.printQuartoUpdate');
		Route::delete('harga/merchant/destroy/{id}', 'HargaController@merchantDestroy')->name('harga.merchantDestroy');
		Route::post('harga/costum-produk/update/', 'HargaController@costumProdukEdit')->name('harga.costumProdukUpdate');
		Route::delete('harga/large-format/destroy/{id}', 'HargaController@largeFormatDestroy')->name('harga.largeFormatDestroy');
		Route::delete('harga/print-quarto/destroy/{id}', 'HargaController@printQuartoDestroy')->name('harga.printQuartoDestroy');
		Route::delete('harga/costum-produk/destroy/{id}', 'HargaController@costumProdukDestroy')->name('harga.costumProdukDestroy');
	});


	Route::resource('/pengguna', 'PenggunaController');
	Route::get('/pengguna/pass/{id}', 'PenggunaController@ganti')->name('gantiPass');


	Route::group(['prefix' => 'inventory'], function() {
		Route::get('pembelian/barang/{id}', 'PembelianController@getBarang');
		Route::resource('stokbarang', 'StokBarangController');
	});

});

Auth::routes();