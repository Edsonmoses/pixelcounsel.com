<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPostedbyIdToEventTpyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evet_types', function (Blueprint $table) {
            $table->string('postedby')->nullable();
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
        Schema::table('evet_types', function (Blueprint $table) {
            $table->dropColumn('postedby');
            $table->dateTime('approved')->nullable();
        });
    }
}
