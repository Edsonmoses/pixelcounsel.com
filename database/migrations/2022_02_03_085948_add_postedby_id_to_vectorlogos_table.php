<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPostedbyIdToVectorlogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vectorlogos', function (Blueprint $table) {
            $table->string('postedby')->nullable((DB::raw('CURRENT_TIMESTAMP')));
             $table->dateTime('approved')->nullable((DB::raw('CURRENT_TIMESTAMP')));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vectorlogos', function (Blueprint $table) {
            $table->dropColumn('postedby');
             $table->dropColumn('approved');
        });
    }
}
