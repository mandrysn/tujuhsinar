<?php

use Illuminate\Database\Seeder;

class HargaIndoorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_indoors')->delete();

    	$data = array(
    		array(
    			'harga_id' => '5',
                'barang_id' => '4',
                'tipe_print' => '1',
    			'range_min' => '21',
                'range_max' => '50',
                'harga_pokok' => '30000.00',
                'harga_jual' => '31000.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		array(
    			'harga_id' => '5',
                'barang_id' => '7',
                'tipe_print' => '2',
    			'range_min' => '10',
                'range_max' => '30',
                'harga_pokok' => '31000.00',
                'harga_jual' => '37000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '5',
                'barang_id' => '4',
                'tipe_print' => '3',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '20000.00',
                'harga_jual' => '25000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '5',
                'barang_id' => '4',
                'tipe_print' => '1',
    			'range_min' => '31',
                'range_max' => '60',
                'harga_pokok' => '20000.00',
                'harga_jual' => '24000.00',
                'disc' => '0',
                'keterangan' => null
                ),
            array(
    			'harga_id' => '2',
                'barang_id' => '7',
                'tipe_print' => '1',
    			'range_min' => '1',
                'range_max' => '21',
                'harga_pokok' => '20000.00',
                'harga_jual' => '24000.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		);

    	DB::table('harga_indoors')->insert($data);
    }
}
