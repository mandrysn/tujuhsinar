<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_kerja_id')->unsigned()->index();
            $table->foreign('order_kerja_id')->references('id')->on('order_kerjas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->double('sudah_bayar', 15, 2);
            $table->string('tipe_pembayaran', 20)->nullable();
            $table->string('ket_piutang', 255)->nullable();
            $table->enum('status_pembayaran', ['Lunas', 'Utang', 'Cancel']);
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
        Schema::dropIfExists('piutangs');
    }
}
