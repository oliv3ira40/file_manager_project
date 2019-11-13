<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventsCalendarToSelectedEventTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selected_event_targets', function (Blueprint $table) {
            $table->integer('event_calendar_id')->nullable()->unsigned();

            $table->foreign('event_calendar_id')
            ->references('id')->on('events_calendar')
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
