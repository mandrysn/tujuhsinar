<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisPotongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_potongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_potong', 20);
            $table->enum('kategori', ['meter', 'lembar']);
            $table->double('harga_pokok', 8, 2);
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
        Schema::dropIfExists('jenis_potongs');
    }
}
