<?php

use Illuminate\Database\Seeder;

class MemberSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->delete();

    	$data = array(
    		array(
    			'nm_tipe' => 'Umum',
    			'keterangan' => 'Member untuk umum',
    			),
    		array(
    			'nm_tipe' => 'Gold',
    			'keterangan' => 'Gold untuk perusahaan',
				),
			array(
    			'nm_tipe' => 'Bronze',
    			'keterangan' => 'Bronze untuk komunitas',
				),
			array(
    			'nm_tipe' => 'Silver',
    			'keterangan' => 'Silver untuk umum',
    			),
    		);

    	DB::table('members')->insert($data);
    }
}
