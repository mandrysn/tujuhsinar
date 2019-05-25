<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaCostumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_costums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('harga_id')->unsigned()->index();
            $table->foreign('harga_id')->references('id')->on('hargas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nama_produk', 50);
            $table->integer('range_min');
            $table->integer('range_max');
            $table->double('harga_pokok', 8, 2);
            $table->double('harga_jual', 8, 2);
            $table->integer('disc');
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_costums');
    }
}
