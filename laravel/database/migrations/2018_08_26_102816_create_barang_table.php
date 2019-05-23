<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->index();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('ukuran_bahan_id')->unsigned()->index();
            $table->foreign('ukuran_bahan_id')->references('id')->on('ukuran_bahans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('barcode', 100);
            $table->enum('produk_id', ['1', '2', '3', '4', '5']);
            $table->string('nm_barang', 100);
            $table->string('kategori', 100);
            $table->string('satuan', 100);
            $table->double('hrg_beli', 8, 2);
            $table->integer('min_stok');
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
        Schema::dropIfExists('barangs');
    }
}
