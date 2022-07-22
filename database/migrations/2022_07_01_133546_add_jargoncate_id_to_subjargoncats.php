<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJargoncateIdToSubjargoncats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjargoncats', function (Blueprint $table) {
            $table->bigInteger('jargoncategory_id')->unsigned()->nullable();
            $table->foreign('jargoncategory_id')->references('id')->on('jargon_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjargoncats', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['jargoncategory_id']);
            // 2. Drop the column
            $table->dropColumn('jargoncategory_id');
        });
    }
}
