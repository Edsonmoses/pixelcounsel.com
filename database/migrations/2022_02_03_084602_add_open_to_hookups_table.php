<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddOpenToHookupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hookups', function (Blueprint $table) {
            $table->dateTime('open')->nullable(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('approved')->nullable('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hookups', function (Blueprint $table) {
            $table->dropColumn('open');
            $table->dropColumn('approved');
        });
    }
}
