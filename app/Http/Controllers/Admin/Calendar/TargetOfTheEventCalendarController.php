<?php

namespace App\Http\Controllers\Admin\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TargetOfTheEventCalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    
}
