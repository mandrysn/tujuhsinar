<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailHargaBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ukuran_bahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned()->index();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('ukuran_bahan_id')->unsigned()->index();
            $table->foreign('ukuran_bahan_id')->references('id')->on('ukuran_bahans')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('detail_ukuran_bahans');
    }
}
