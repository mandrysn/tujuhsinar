<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderKerjaSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_kerja_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_kerja_id')->unsigned()->index();
            $table->foreign('order_kerja_id')->references('id')->on('order_kerjas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->dateTime('deadline'); //estimasi
            $table->integer('barang_id')->nullable()->unsigned()->index();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('produk_id', ['1', '2', '3', '4', '5']);
            $table->enum('status_produksi', ['1', '2', '3', '4'])->default(1);
            $table->double('harga', 11, 2);
            $table->double('total', 11, 2);
            $table->integer('diskon');
            $table->integer('qty');
            $table->string('keterangan_sub')->nullable();
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
        Schema::dropIfExists('order_kerja_subs');
    }
}
