<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaIndoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_indoors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('harga_id')->unsigned()->index();
            $table->foreign('harga_id')->references('id')->on('hargas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('barang_id')->unsigned()->index();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('tipe_print', ['1', '2', '3']);
            $table->integer('range_min');
            $table->integer('range_max');
<<<<<<< HEAD
            $table->double('harga_pokok', 8, 2);
            $table->double('harga_jual', 8, 2);
=======
            $table->double('harga_pokok', 11, 2);
            $table->double('harga_jual', 11, 2);
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
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
        Schema::dropIfExists('harga_indoors');
    }
}
