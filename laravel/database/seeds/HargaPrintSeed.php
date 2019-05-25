<?php

use Illuminate\Database\Seeder;

class HargaPrintSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_prints')->delete();

    	$data = array(
    		array(
                'harga_id' => '6',
                'barang_id' => '8',
                'tipe_print' => '1',
                'ukuran' => '1',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '20000.00',
                'harga_jual' => '20100.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		);

    	DB::table('harga_prints')->insert($data);
    }
}
