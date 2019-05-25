<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeliDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beli_id')->unsigned()->index();
            $table->foreign('beli_id')->references('id')->on('belis')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('barang_id')->unsigned()->index();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('qty');
            $table->double('harga', 15, 2);
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
        Schema::dropIfExists('beli_details');
    }
}
