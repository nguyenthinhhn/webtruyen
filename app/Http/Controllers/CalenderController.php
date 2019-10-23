<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\CalenderImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Calendar;
use Carbon\Carbon;
use DateTime;
use App\Event;

class CalenderController extends Controller
{
    public function import(Request $request) 
    {
        Excel::import(new CalenderImport, $request->calender);
        return redirect('/calender')->with('success', 'All good!');
    }
    public function calender(){
    	$events = [];
        $data = Schedule::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
            	$startdate = Carbon::create($value->date);
            	$startdate->addHours(10);
                $events[] = Calendar::event(
                    $value->class,
                    false,
                    new DateTime($startdate),
                    new DateTime($startdate->addHours(3)),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#ff6100',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        return view('backend/fullcalender', compact('calendar'));
    }
}
