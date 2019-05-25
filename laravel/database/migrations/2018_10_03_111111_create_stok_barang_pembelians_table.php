<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokBarangPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barang_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pembelian_id')->unsigned()->index();
            $table->foreign('pembelian_id')->references('id')->on('pembelians')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('qty');
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
        Schema::dropIfExists('stok_barang_pembelians');
    }
}
