<?php

use Illuminate\Database\Seeder;

class HargaCostumSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harga_costums')->delete();

    	$data = array(
    		array(
                'harga_id' => '7',
                'nama_produk' => 'test costum',
    			'range_min' => '1',
                'range_max' => '30',
                'harga_pokok' => '1000.00',
                'harga_jual' => '1100.00',
                'disc' => '0',
                'keterangan' => null
    			),
    		);

    	DB::table('harga_costums')->insert($data);
    }
}
