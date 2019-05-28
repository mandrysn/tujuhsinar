<?php

use Illuminate\Database\Seeder;

class DetailUkuranBahan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukuran_bahan_details')->delete();

    	$data = array(
    		array(
                'barang_id' => '9',
                'ukuran_bahan_id' => '1',
             
    			),
    		array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '2',
            
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '3',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '4',
              
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '5',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '6',
               
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '7',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '8',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '9',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '10',
               
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '11',
            
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '12',
             
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '13',
                
                ),
            array(
    			'barang_id' => '9',
                'ukuran_bahan_id' => '14',
             
                ),
            array(
                'barang_id' => '10',
                'ukuran_bahan_id' => '1',
             
    			),
    		array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '2',
            
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '3',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '4',
              
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '5',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '6',
               
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '7',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '8',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '9',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '10',
               
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '11',
            
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '12',
             
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '13',
                
                ),
            array(
    			'barang_id' => '10',
                'ukuran_bahan_id' => '14',
             
                ),
    		);

    		DB::table('ukuran_bahan_details')->insert($data);
    }
}
