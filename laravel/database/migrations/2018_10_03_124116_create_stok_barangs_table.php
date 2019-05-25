<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stok_barang_pembelian_id')->unsigned()->index();
            $table->foreign('stok_barang_pembelian_id')->references('id')->on('stok_barang_pembelians')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->date('tgl');
            $table->integer('qty_keluar');
            $table->string('keperluan');
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
        Schema::dropIfExists('stok_barangs');
    }
}
