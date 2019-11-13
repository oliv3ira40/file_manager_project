<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class TargetOfTheEventCalendar extends Model
{
	protected $table = 'targets_of_the_events_calendar';
    protected $fillable = [
		'name',
	];



	function SelectedEventTarget() {
    	return $this->hasMany(SelectedEventTarget::class);
    }
}
