<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVectorlogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vectorlogos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description');
            $table->string('designer');
            $table->string('format');
            $table->string('contributor');
            $table->enum('vector_status',['published','unpublished']);
            $table->text('images')->default('placesholder.jpg');
            $table->bigInteger('vector_categories_id')->unsigned()->nullable();
            $table->string('image')->default('aidefault.png');
            $table->timestamps();
            $table->foreign('vector_categories_id')->references('id')->on('vector_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vectorlogos');
    }
}
