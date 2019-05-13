<?php

use Illuminate\Database\Seeder;

class HargaOutdoorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_outdoors')->delete();

    	$data = array(
    		array(
    			'harga_id' => '1',
    			'barang_id' => '1',
    			'range_min' => '1',
                'range_max' => '20',
                'harga_pokok' => '30000.00',
                'harga_jual' => '33000.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		array(
    			'harga_id' => '1',
    			'barang_id' => '2',
    			'range_min' => '10',
                'range_max' => '50',
                'harga_pokok' => '33000.00',
                'harga_jual' => '38000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '1',
    			'barang_id' => '3',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '20000.00',
                'harga_jual' => '25000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '1',
    			'barang_id' => '3',
    			'range_min' => '31',
                'range_max' => '60',
                'harga_pokok' => '20000.00',
                'harga_jual' => '24000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '1',
    			'barang_id' => '3',
    			'range_min' => '50',
                'range_max' => '70',
                'harga_pokok' => '40000.00',
                'harga_jual' => '54000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '1',
    			'barang_id' => '1',
    			'range_min' => '1',
                'range_max' => '40',
                'harga_pokok' => '20000.00',
                'harga_jual' => '24000.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		);

    	DB::table('harga_outdoors')->insert($data);
    }
}