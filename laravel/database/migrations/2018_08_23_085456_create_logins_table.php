<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_telp', 12);
            $table->string('username', 100);
            $table->string('password');
            $table->integer('role')->default(1);
            $table->rememberToken();
            $table->timestamps();
<<<<<<< HEAD
=======
            $table->softDeletes();
>>>>>>> 1182038c58e4e85bf507efbb7a35631dbef94174
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
