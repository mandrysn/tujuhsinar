<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HapusIndexDiUkuranBahans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ukuran_bahans', function (Blueprint $table) {
            $table->dropForeign('ukuran_bahans_barang_id_foreign');
            $table->dropIndex('ukuran_bahans_barang_id_index');
            $table->dropColumn('barang_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ukuran_bahans', function (Blueprint $table) {
            $table->integer('barang_id')->unsigned()->index();
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }
}
