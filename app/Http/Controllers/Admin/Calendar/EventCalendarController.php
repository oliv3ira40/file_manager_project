<?php

namespace App\Http\Controllers\Admin\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Calendar\EventCalendar;
use App\Models\Calendar\TargetOfTheEventCalendar;
use App\Models\Calendar\SelectedEventTarget;

class EventCalendarController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	


    function index()
    {
        $targets_events = TargetOfTheEventCalendar::orderBy('created_at', 'desc')->get();
    	return view('Admin.calendar.index', compact('targets_events'));
    }

    function newEvent(Request $req)
    {
        $data = $req->all();

        if ($data['name'] == null OR $data['target_of_the_event_id'] == null) {
            return 'false';
        }

        $data['event_day'] = date_create($data['event_day']);
        $data['end_of_the_event'] = date_create($data['end_of_the_event']);

        if ($data['event_day']->format('d') == $data['end_of_the_event']->format('d')) {
            unset($data['end_of_the_event']);
        } else {

            // ADEQUANDO A DATA ESPERADA PELO PLUGIN
            if ($data['end_of_the_event']->format('H') > 0 OR
                $data['end_of_the_event']->format('i') > 0)
            {
            
                $data['end_of_the_event'] = $data['end_of_the_event']->format('Y-m-d H:i');
            } else {

                $data['end_of_the_event'] = date('Y-m-d H:i', 
                    strtotime($data['end_of_the_event']->format('Y-m-d H:i') . '+1 day'));
            }
        }
        

        $data['event_day'] = $data['event_day']->format('Y-m-d H:i');

        $event_calendar = EventCalendar::create($data);
        if (!$event_calendar) return 'false';

        $data_2['event_calendar_id'] = $event_calendar->id;
        foreach ($data['target_of_the_event_id'] as $target) {
            $data_2['target_of_the_event_id'] = $target;
            $selected_event_target = SelectedEventTarget::create($data_2);
            
            if (!$selected_event_target) return 'false';
        }
    }

    function getListEvents()
    {
        $list_events = EventCalendar::orderBy('created_at', 'desc')->get();

        $data = [];
        foreach ($list_events as $event) {
            $n = [];
            $n['groupId'] = $event['id'];
            $n['title'] = $event['name'];
            
            $n['start'] = str_replace(' ', 'T', $event['event_day']);
            $n['start'] = str_replace('T00:00', '', $n['start']);
            
            if ($event['end_of_the_event'] != null) {
                $n['end'] = str_replace(' ', 'T', $event['end_of_the_event']);
                $n['end'] = str_replace('T00:00', '', $n['end']);
            }

            array_push($data, $n);
        }
        return $data;
    }

    function updateEvent(Request $req)
    {
        $data = $req->all();

        $event_calendar = EventCalendar::find($data['id']);
        $event_calendar->update($data);

        return $event_calendar;
    }

    function getInfo(Request $req)
    {
        $data = $req->all();
        
        $event_calendar['event'] = EventCalendar::find($data['id']);
        
        $selecteds_targets = [];
        foreach ($event_calendar['event']->SelectedEventTarget as $selected_target) {
            array_push($selecteds_targets, $selected_target->TargetOfTheEventCalendar->name);
        }
        $event_calendar['selecteds_targets'] = $selecteds_targets;
        
        return $event_calendar;
    }

    function deleteEvent(Request $req)
    {
        $data = $req->all();

        $event_calendar = EventCalendar::find($data['id']);
        $event_calendar->delete();

        return redirect()->route('admin.calendar.index');
    }
}
