<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description');
            $table->string('exhibition');
            $table->string('eventdate');
            $table->enum('events_status',['published','unpublished']);
            $table->text('images')->nullable();
            $table->bigInteger('events_categories_id')->unsigned()->nullable();
            $table->bigInteger('etype_id')->unique()->nullable();
            $table->string('econtact')->nullable();
            $table->string('eventemail')->nullable();
            $table->string('ephone')->nullable();
            $table->string('website')->nullable();
            $table->string('ticket')->nullable();
            $table->string('enddate')->after('eventdate')->nullable();
            $table->timestamps();
            $table->foreign('events_categories_id')->references('id')->on('events_categories')->onDelete('cascade');
            $table->foreign('etype_id')->references('id')->on('event_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
