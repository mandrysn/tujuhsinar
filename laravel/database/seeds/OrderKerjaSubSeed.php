<?php

use Illuminate\Database\Seeder;

class OrderKerjaSubSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_kerja_subs')->delete();

    	$data = array(
    		array(
                'order_kerja_id' => '1',
                'deadline' => '2019-04-28 00:00:00',
                'barang_id' => '1',
                'produk_id' => '1',
                'status_produksi' => '1',
                'harga' => '66000.00',
                'total' => '96000.00',
                'diskon' => '0',
                'qty' => '1',
                'keterangan_sub' => 'Nama File: Outdoor<br />Ukuran: 1.00x2.00<br />Finishing: Lebih putih, Rp 30,000<br />Kaki: Tanpa Tambahan, Rp 0'
    			),
    		);

    	DB::table('order_kerja_subs')->insert($data);
    }
}
