<?php

use Illuminate\Database\Seeder;

class UkuranBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukuran_bahans')->delete();

    	$data = array(
    		array(
                'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 1 m',
                'range_min' => '0.01',
                'range_max' => '1.00'
    			),
    		array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 1.05 m',
                'range_min' => '1.01',
                'range_max' => '1.05'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 1.5 m',
                'range_min' => '1.06',
                'range_max' => '1.50'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 1.55 m',
                'range_min' => '1.51',
                'range_max' => '1.55'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2 m',
                'range_min' => '1.56',
                'range_max' => '2.00'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2.05 m',
                'range_min' => '2.01',
                'range_max' => '2.05'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2.10 m',
                'range_min' => '2.06',
                'range_max' => '2.10'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2.15 m',
                'range_min' => '2.11',
                'range_max' => '2.15'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2.50 m',
                'range_min' => '2.16',
                'range_max' => '2.50'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 2.55 m',
                'range_min' => '2.51',
                'range_max' => '2.55'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 3 m',
                'range_min' => '2.56',
                'range_max' => '3.00'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 3.05 m',
                'range_min' => '3.01',
                'range_max' => '3.05'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 3.10 m',
                'range_min' => '3.06',
                'range_max' => '3.10'
                ),
            array(
    			'barang_id' => '1',
                'produk_id' => '1',
                'nm_ukuran_bahan' => 'Uk 3.15 m',
                'range_min' => '3.11',
                'range_max' => '3.15'
                ),
    		);

    	DB::table('ukuran_bahans')->insert($data);
    }
}
