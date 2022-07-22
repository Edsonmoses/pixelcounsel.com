<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesIdToAlpFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alp_filters', function (Blueprint $table) {
            $table->bigInteger('vectorategory_id')->unsigned()->nullable()->after('name');
            $table->bigInteger('jargoncategory_id')->unsigned()->nullable()->after('category_id');
            $table->bigInteger('hookupcategory_id')->unsigned()->nullable()->after('jargoncategory_id');
            $table->bigInteger('eventscategory_id')->unsigned()->nullable()->after('hookupcategory_id');

            $table->foreign('vectorategory_id')->references('id')->on('vector_categories')->onDelete('cascade');
            $table->foreign('jargoncategory_id')->references('id')->on('jargon_categories')->onDelete('cascade');
            $table->foreign('hookupcategory_id')->references('id')->on('hookup_categories')->onDelete('cascade');
            $table->foreign('eventscategory_id')->references('id')->on('events_categories')->onDelete('cascade');
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
