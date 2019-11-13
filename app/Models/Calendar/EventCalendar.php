<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class EventCalendar extends Model
{
	protected $table = 'events_calendar';
    protected $fillable = [
		'name', 'comments', 'event_day', 'end_of_the_event',
	];



	function SelectedEventTarget() {
    	return $this->hasMany(SelectedEventTarget::class);
    }
}
