<?php

use Illuminate\Database\Seeder;

class OrderKerjaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_kerjas')->delete();

    	$data = array(
    		array(
                'order' => '00001',
                'tanggal' => '2019-04-22 00:00:00',
    			'pelanggan_id' => '1',
                'status_payment' => 'belum bayar',
                'keterangan' => null
    			),
    		);

    	DB::table('order_kerjas')->insert($data);
    }
}
