<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHookupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('company');
            $table->string('jobtitle');
            $table->string('location');
            $table->enum('hookup_status',['published','unpublished']);
            $table->text('images')->default('LOGO-loading-1.jpg');
            $table->bigInteger('hookup_categories_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('hookup_categories_id')->references('id')->on('hookup_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hookups');
    }
}
