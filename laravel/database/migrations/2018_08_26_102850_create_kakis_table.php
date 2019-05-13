<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKakisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kakis', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('produk_id', ['1', '2', '3', '4', '5']);
            $table->string('nama_kaki', 100);
            $table->double('tambahan_harga', 8, 2);
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
        Schema::dropIfExists('kakis');
    }
}
