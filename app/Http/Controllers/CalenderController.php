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
                $thoigian = explode(",", trim($value->lesson));

                if($thoigian[0] == 1) {
                    $startdate->addHours(7);
                } else if ($thoigian[0] == 4) {
                    $startdate->addHours(9);
                    $startdate->addMinute(30);
                } else if ($thoigian[0] == 7) {
                    $startdate->addHours(12);
                    $startdate->addMinute(30);
                } else if ($thoigian[0] == 10) {
                    $startdate->addHours(15);
                    $startdate->addMinute(30);
                } else if ($thoigian[0] == 13) {
                    $startdate->addHours(18);
                } else {
                    $startdate->addHours(18);
                }
                $title = $value->location . " - " . $value->class;
                $events[] = Calendar::event(
                    $title,
                    false,
                    new DateTime($startdate),
                    new DateTime($startdate->addHours(2)->addMinute(30)),
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
