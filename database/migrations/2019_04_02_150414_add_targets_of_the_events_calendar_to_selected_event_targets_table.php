<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTargetsOfTheEventsCalendarToSelectedEventTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selected_event_targets', function (Blueprint $table) {
            $table->integer('target_of_the_event_id')->nullable()->unsigned();

            $table->foreign('target_of_the_event_id')
            ->references('id')->on('targets_of_the_events_calendar')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('selected_event_targets', function (Blueprint $table) {
            //
        });
    }
}
