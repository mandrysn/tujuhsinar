<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('produk_id', ['1', '2', '3', '4', '5']);
            $table->enum('type', ['1', '2', '3'])->default(1);
            $table->integer('member_id')->unsigned()->index();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nama_finishing', 100);
            $table->double('tambahan_harga', 11, 2);
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
        Schema::dropIfExists('editors');
    }
}
