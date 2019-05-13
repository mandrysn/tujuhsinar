<?php

use Illuminate\Database\Seeder;

class KakisTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kakis')->delete();

        $data = array(
            array(
                'produk_id' => 1,
                'nama_kaki' => 'Tanpa Tambahan',
                'tambahan_harga' => '0.00'
                ),
            array(
                'produk_id' => 2,
                'nama_kaki' => 'Tanpa Tambahan',
                'tambahan_harga' => '0.00'
    			),
            array(
                'produk_id' => 1,
                'nama_kaki' => 'Roll X',
                'tambahan_harga' => '32000.00'
    			),
            array(
                'produk_id' => 1,
                'nama_kaki' => 'Roll Y',
                'tambahan_harga' => '30000.00'
    			),
            array(
                'produk_id' => 1,
                'nama_kaki' => 'Roll Up',
                'tambahan_harga' => '12000.00'
    			),
            array(
                'produk_id' => 2,
                'nama_kaki' => 'Roll Down',
                'tambahan_harga' => '35000.00'
    			),
            array(
                'produk_id' => 2,
                'nama_kaki' => 'Roll X',
                'tambahan_harga' => '38000.00'
    			),
            array(
                'produk_id' => 2,
                'nama_kaki' => 'Roll Y',
                'tambahan_harga' => '22000.00'
    			),
            array(
                'produk_id' => 2,
                'nama_kaki' => 'X-Banner',
                'tambahan_harga' => '45000.00'
    			)
    		);

    	DB::table('kakis')->insert($data);
    }
}
