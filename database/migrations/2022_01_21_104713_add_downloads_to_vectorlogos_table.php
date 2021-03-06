<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDownloadsToVectorlogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vectorlogos', function (Blueprint $table) {
            $table->string("downloads")->nullable(0);
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
            $table->dropColumn('downloads');
        });
    }
}
