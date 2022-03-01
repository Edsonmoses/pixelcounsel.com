<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJargonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jargons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description');
            $table->enum('jargons_status',['published','unpublished']);
            $table->text('images')->default('placesholder.jpg');
            $table->bigInteger('jargon_categories_id')->unsigned()->nullable();
            $table->string('afid')->after('jargon_categories_id')->nullable();
            $table->timestamps();
            $table->foreign('jargon_categories_id')->references('id')->on('jargon_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jargons');
    }
}
