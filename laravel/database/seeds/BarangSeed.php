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
    			'supplier_id' => 5,
				'barcode' => 'FL001',
				'produk_id' => '1',
    			'nm_barang' => 'Spanduk 280 gr',
    			'kategori' => 'Kertas',
    			'satuan' => 'lembar',
    			'hrg_beli' => 1568000,
    			'min_stok' => 264,
    			),
    		array(
    			'supplier_id' => 7,
				'barcode' => 'FL002',
				'produk_id' => '1',
    			'nm_barang' => 'Korcin 440 gr',
    			'kategori' => 'Spanduk',
    			'satuan' => 'lembar',
    			'hrg_beli' => 2400000,
    			'min_stok' => 160,
				),
			array(
    			'supplier_id' => 7,
				'barcode' => 'FL003',
				'produk_id' => '1',
    			'nm_barang' => 'Backlite 610 gr',
    			'kategori' => 'Spanduk',
    			'satuan' => 'lembar',
    			'hrg_beli' => 4000000,
    			'min_stok' => 160,
    			),
    		array(
    			'supplier_id' => 4,
				'barcode' => 'FL004',
				'produk_id' => '1',
    			'nm_barang' => 'Cloth Banner',
    			'kategori' => 'Umbul - umbul',
    			'satuan' => 'lembar',
    			'hrg_beli' => 1440000.00,
    			'min_stok' => 126,
				),
    		);

    	DB::table('barangs')->insert($data);
    }
}
