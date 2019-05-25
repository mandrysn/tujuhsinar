<?php

use Illuminate\Database\Seeder;

class BarangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->delete();

    	$data = array(
    		array(
    			'supplier_id' => 1,
				'barcode' => '981273878112',
				'produk_id' => '1',
    			'nm_barang' => 'Kertas HVS A4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 12000,
    			'min_stok' => 1,
    			),
    		array(
    			'supplier_id' => 1,
				'barcode' => '981264547811',
				'produk_id' => '1',
    			'nm_barang' => 'Kertas HVS F4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 15000,
    			'min_stok' => 1,
				),
			array(
    			'supplier_id' => 1,
				'barcode' => '982147330111',
				'produk_id' => '1',
    			'nm_barang' => 'Kertas HVS D4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 34000,
    			'min_stok' => 1,
    			),
    		array(
    			'supplier_id' => 2,
				'barcode' => '981262347811',
				'produk_id' => '2',
    			'nm_barang' => 'Kertas HVS H4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 54000,
    			'min_stok' => 1,
				),
			array(
    			'supplier_id' => 1,
				'barcode' => '981221300811',
				'produk_id' => '3',
    			'nm_barang' => 'Kertas HVS D4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 44000,
    			'min_stok' => 4,
				),
			array(
    			'supplier_id' => 2,
				'barcode' => '983589302825',
				'produk_id' => '3',
    			'nm_barang' => 'Kertas HVS S4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 47000,
    			'min_stok' => 4,
				),
			array(
    			'supplier_id' => 1,
				'barcode' => '981507932836',
				'produk_id' => '2',
    			'nm_barang' => 'Kertas SVS R4',
    			'kategori' => 'Kertas',
    			'satuan' => 'Rim',
    			'hrg_beli' => 37000,
    			'min_stok' => 2,
				),
			array(
    			'supplier_id' => 1,
				'barcode' => '993884122321',
				'produk_id' => '4',
    			'nm_barang' => 'Kertas Harga Economy a4',
    			'kategori' => 'Poseter',
    			'satuan' => 'Lembar',
    			'hrg_beli' => 17000,
    			'min_stok' => 1,
    			),
    		);

    	DB::table('barangs')->insert($data);
    }
}
