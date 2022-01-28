<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mname');
            $table->string('surname');
            $table->string('dbirth');
            $table->string('sex');
            $table->string('marital');
            $table->string('image');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('url');
            $table->string('address');
            $table->string('graduation');
            $table->string('university');
            $table->string('certification');
            $table->string('Level');
            $table->string('course');
            $table->string('information');
            $table->string('company');
            $table->string('position');
            $table->string('location');
            $table->string('datefrom');
            $table->string('dateto');
            $table->string('information1');
            $table->string('skills');
            $table->string('skill_proficiency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
