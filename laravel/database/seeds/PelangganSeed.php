<?php

use Illuminate\Database\Seeder;

class PelangganSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggans')->delete();

    	$data = array(
    		array(
    			'member_id' => 1,
    			'nama' => 'Applegate',
    			'alamat' => 'Jl. Lambung Mangkurat Gg.3 Blok B',
    			'no_telp' => '085245762133',
    			'email' => 'donyahmd24@gmail.com',
    			),
            array(
                'member_id' => 2,
                'nama' => 'Ventura',
                'alamat' => 'Jl. Lambung Mangkurat Gg.3',
                'no_telp' => '085234322433',
                'email' => 'mahendrayusril@gmail.com',
                ),
            array(
                'member_id' => 3,
                'nama' => 'Bagus',
                'alamat' => 'Jl. Jelawat',
                'no_telp' => '00000000000',
                'email' => 'bagus@gmail.com',
                ),
            array(
                'member_id' => 4,
                'nama' => 'Nokanel',
                'alamat' => 'Jl. Damanhuri Perum BTI Blok BO Rt 24',
                'no_telp' => '085348905050',
                'email' => 'faturfachsandy31@gmail.com',
                ),
    		);

    	DB::table('pelanggans')->insert($data);
    }
}
