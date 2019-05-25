<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_pembelian');
            $table->enum('status_pembayaran', ['Lunas', 'Utang']);
            $table->double('total_harga', 15, 2);
            $table->double('total_bayar', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belis');
    }
}
