<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HapusRangeDiHargaCostum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('harga_costums', function($table) {
            $table->dropColumn('range_min');
            $table->dropColumn('range_max');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harga_costums', function($table) {
            $table->dropColumn('range_min');
            $table->dropColumn('range_max');
        });
    }
}
