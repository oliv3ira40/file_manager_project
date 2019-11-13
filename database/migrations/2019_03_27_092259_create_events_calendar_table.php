<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('comments')->nullable();
            $table->string('event_day', 100)->nullable();
            $table->string('end_of_the_event', 100)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_calendar');
    }
}