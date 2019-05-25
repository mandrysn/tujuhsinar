<?php

use Illuminate\Database\Seeder;

class HargaMerchantSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_merchants')->delete();

    	$data = array(
    		array(
    			'harga_id' => '3',
                'barang_id' => '5',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '20000.00',
                'harga_jual' => '21000.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		array(
    			'harga_id' => '3',
                'barang_id' => '5',
    			'range_min' => '31',
                'range_max' => '70',
                'harga_pokok' => '31000.00',
                'harga_jual' => '37000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '3',
                'barang_id' => '6',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '20000.00',
                'harga_jual' => '25000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '3',
                'barang_id' => '5',
    			'range_min' => '71',
                'range_max' => '100',
                'harga_pokok' => '20000.00',
                'harga_jual' => '24000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '3',
                'barang_id' => '6',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '10000.00',
                'harga_jual' => '14000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '4',
                'barang_id' => '5',
    			'range_min' => '1',
                'range_max' => '40',
                'harga_pokok' => '10300.00',
                'harga_jual' => '14300.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		);

    	DB::table('harga_merchants')->insert($data);
    }
}
