<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_kerjas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order');
            $table->dateTime('tanggal');
            $table->integer('pelanggan_id')->unsigned()->index();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status_payment', ['belum bayar', 'tunai', 'transfer', 'invoice', 'down payment'])->default('belum bayar');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('order_kerjas');
    }
}
