<?php

use Illuminate\Database\Seeder;

class HargaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hargas')->delete();

    	$data = array(
    		array(
    			'member_id' => '1',
                'keterangan' => 'member Umum outdoor',
                'produk_id' => '1',
    			),
    		array(
    			'member_id' => '2',
                'keterangan' => 'Member gold indoor',
                'produk_id' => '2'
				),
			array(
    			'member_id' => '1',
                'keterangan' => 'member umum merchant',
                'produk_id' => '3'
                ),
            array(
    			'member_id' => '2',
                'keterangan' => 'member bronze merchant',
                'produk_id' => '3'
                ),
            array(
    			'member_id' => '1',
                'keterangan' => 'member gold indoor',
                'produk_id' => '2'
                ),
            array(
    			'member_id' => '1',
                'keterangan' => 'test print',
                'produk_id' => '4'
                ),
            array(
    			'member_id' => '1',
                'keterangan' => 'test umum costum',
                'produk_id' => '5'
    			),
    		);

        DB::table('hargas')->insert($data);
    }
}
