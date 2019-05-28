<?php

use Illuminate\Database\Seeder;

class SupplierSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->delete();

    	$data = array(
    		array(
				'id' => 4,
    			'nm_lengkap' => 'Media World',
    			'alamat' => 'Jl. Ir Sutami Kompleks Pergudangan',
    			'no_telp' => '082388680088',
    			'email' => 'gias@gmail.com',
    			'keterangan' => 'suplier bahan baku spanduk,stiker dll',
    			),
    		array(
				'id' => 5,
    			'nm_lengkap' => 'Mapank Samarinda',
    			'alamat' => 'Jl. D.I Panjaitan Kompleks Ruko Segiri II',
    			'no_telp' => '081347898982',
    			'email' => 'adriansyah22@gmail.com',
    			'keterangan' => 'Supplier Spanduk,',
				),
			array(
				'id' => 7,
    			'nm_lengkap' => 'Wujud Unggul Sby',
    			'alamat' => 'Jl. Bendul Merisi Barat',
    			'no_telp' => '081347898982',
    			'email' => 'adriansyah22@gmail.com',
    			'keterangan' => 'Supplier Spanduk,',
    			),
    		);

    	DB::table('suppliers')->insert($data);
    }
}
