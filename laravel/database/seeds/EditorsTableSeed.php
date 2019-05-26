<?php

use Illuminate\Database\Seeder;

class EditorsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editors')->delete();

        $data = array(
            array(
                'produk_id' => 1,
                'member_id' => '4',
                'type' => '1',
                'nama_finishing' => 'Tanpa Tambahan',
                'tambahan_harga' => '0.00'
                ),
            array(
                'produk_id' => 2,
                'member_id' => '2',
                'type' => '1',
                'nama_finishing' => 'Tanpa Tambahan',
                'tambahan_harga' => '0.00'
                ),
            array(
                'produk_id' => 4,
                'member_id' => '3',
                'type' => '1',
                'nama_finishing' => 'Tanpa Tambahan',
                'tambahan_harga' => '0.00'
    			),
            array(
                'produk_id' => 1,
                'member_id' => '4',
                'type' => '1',
                'nama_finishing' => 'Mata ayam',
                'tambahan_harga' => '32000.00'
    			),
            array(
                'produk_id' => 1,
                'member_id' => '4',
                'type' => '2',
                'nama_finishing' => 'Lebih putih',
                'tambahan_harga' => '30000.00'
    			),
            array(
                'produk_id' => 1,
                'member_id' => '4',
                'type' => '3',
                'nama_finishing' => 'Non Mata ayam',
                'tambahan_harga' => '12000.00'
    			),
            array(
                'produk_id' => 2,
                'member_id' => '2',
                'nama_finishing' => 'Laminasi Doft',
                'tambahan_harga' => '35000.00'
    			),
            array(
                'produk_id' => 2,
                'member_id' => '4',
                'type' => '2',
                'nama_finishing' => 'Laminasi Glossy',
                'tambahan_harga' => '38000.00'
    			),
            array(
                'produk_id' => 2,
                'member_id' => '3',
                'type' => '3',
                'nama_finishing' => 'Mata ayam',
                'tambahan_harga' => '22000.00'
    			),
            array(
                'produk_id' => 2,
                'member_id' => '1',
                'type' => '1',
                'nama_finishing' => 'Non Finishing',
                'tambahan_harga' => '45000.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '1',
                'type' => '2',
                'nama_finishing' => 'Laminasi Doft',
                'tambahan_harga' => '11000.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '2',
                'type' => '3',
                'nama_finishing' => 'Laminasi Glossy',
                'tambahan_harga' => '45000.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '4',
                'type' => '1',
                'nama_finishing' => 'Cutting',
                'tambahan_harga' => '12500.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '3',
                'type' => '2',
                'nama_finishing' => 'Laminasi + Cut Doft',
                'tambahan_harga' => '12500.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '4',
                'type' => '3',
                'nama_finishing' => 'Laminasi + Cut Glossy',
                'tambahan_harga' => '54000.00'
    			),
            array(
                'produk_id' => 4,
                'member_id' => '2',
                'type' => '1',
                'nama_finishing' => 'Non Finishing',
                'tambahan_harga' => '54100.00'
    			)
    		);

    	DB::table('editors')->insert($data);
    }
}
