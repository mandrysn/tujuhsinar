<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

    	$data = array(
    		array(
    			'nama' => 'admin', 
    			'alamat' => 'Lambung Mangkurat',
    			'no_telp' => '0836367333',
    			'username' => 'admin',
                'role'      => '1',
    			'password' => '$2y$10$8SZTOXjZjIIwqDB4L/Q.kOiERrheHctF809U2AP/4Cd0mk6ySc1iy',
    			),
            array(
                'nama' => 'Petugas order', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'order',
                'role'      => '2',
                'password' => '$2y$10$okm4mU.TO9ZSl.tP7rLdSeT8ajJPkHc0iHTTgQgZAulzcLJl8Y60O',
                ),
            array(
                'nama' => 'Kasir', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'kasir',
                'role'      => '3',
                'password' => '$2y$10$gHsThtq78NiZBm8PS6p.euDzinAt9ivTk.F3LoQO4SReZRLlwRnWa',
                ),
            array(
                'nama' => 'Owner', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'owner',
                'role'      => '5',
                'password' => '$2y$10$fO8RRbf5sxUElbMUDNZJ0evQ45q2CMjk8Q5IJdT/13qB600bH/c.a',
                ),
            array(
                'nama' => 'Outdoor', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'outdoor',
                'role'      => '4',
                'password' => '$2y$10$ADX.2A1Z.rtJT/Pcyvbk5eHkkZaEjdcFn07D2p8iazDZgVLp9FO0i',
                ),
            array(
                'nama' => 'Indoor', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'indoor',
                'role'      => '4',
                'password' => '$2y$10$hYA0NxvX/B3QZnjB2xB4fOkBjG1r4HtPe64hwCKYmUeMd2vrtLvJu',
                ),
            array(
                'nama' => 'Merchant', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'merchant',
                'role'      => '4',
                'password' => '$2y$10$uybiRjUlXiy8yLFKtvLTie8GUTn.lFScsDXS.DUc4EJ0w3e4N8OiS',
                ),
            array(
                'nama' => 'Print a3', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'printa3',
                'role'      => '4',
                'password' => '$2y$10$M8eAW.jjMjsgLpRLNso.feHLUqOO9BokhnEMCva/kmvUF4lMva/IC',
                ),
            array(
                'nama' => 'Custom', 
                'alamat' => 'Lambung Mangkurat',
                'no_telp' => '0836367333',
                'username' => 'custom',
                'role'      => '4',
                'password' => '$2y$10$6imCWsFssc4kSiUU37hi4.1I73YalQJiOFTqbixRp.7hmJjtgGqti',
                )
    		);

    	DB::table('users')->insert($data);
    }
}
