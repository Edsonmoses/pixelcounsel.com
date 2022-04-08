<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToAlpFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alp_filters', function (Blueprint $table) {
           $table->bigInteger('category_id')->unsigned()->nullable()->after('name');
           $table->foreign('category_id')->references('id')->on('jargon_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alp_filters', function (Blueprint $table) {
            //
        });
    }
}
