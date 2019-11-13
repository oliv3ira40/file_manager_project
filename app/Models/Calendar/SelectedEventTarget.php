<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class SelectedEventTarget extends Model
{
    protected $table = 'selected_event_targets';
    protected $fillable = [
		'event_calendar_id', 'target_of_the_event_id',
	];



	function TargetOfTheEventCalendar() {
    	return $this->belongsTo(TargetOfTheEventCalendar::class, 'target_of_the_event_id');
    }
}
