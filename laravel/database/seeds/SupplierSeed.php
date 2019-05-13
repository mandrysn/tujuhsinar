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
    			'nm_lengkap' => 'CV. GreenNusa Computindo',
    			'alamat' => 'Jl. Depan Lembus',
    			'no_telp' => '085283782723',
    			'email' => 'donyahmd@gmail.com',
    			'keterangan' => 'keterangan dawdawaw',
    			),
    		array(
    			'nm_lengkap' => 'CV. GreenNusa Computindo 2',
    			'alamat' => 'Jl. Depan Lembus',
    			'no_telp' => '0852352355',
    			'email' => 'dwadwad@gmail.com',
    			'keterangan' => 'wadiijlk 72878',
    			),
    		);

    	DB::table('suppliers')->insert($data);
    }
}
