<?php

namespace App\Http\Controllers;
use App\Models\{Business,Reservation,ScheduleEvent,AssignScheduleReservation};
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //MainPage
    public function listEvents(Request $request)
    {
        $schedule = AssignScheduleReservation::orderBy('id', 'DESC')->get();
        $schedule->map(function ($item){
            $schedule_data = ScheduleEvent::find($item->schedule_id);
            $item->team = $schedule_data->team;
            $item->location = $schedule_data->location;
            $item->status = $schedule_data->status;
            $reservation_data = Reservation::find($item->reservation_id);
            $item->r_date = $reservation_data->r_date;
            $item->r_type = $reservation_data->r_type;
        });
        $business = Business::first();
        return view('events',compact('business','schedule'));
    }


    public function listSchedule()
    {
        $approved = Reservation::with('reservation_package')->where('status', 'approved')->get();
        $r_id = AssignScheduleReservation::get();
        $schedule = AssignScheduleReservation::with('reservation')->with('schedule')->get();
        $schedule->map(function ($item){
            $schedule_data = ScheduleEvent::find($item->schedule_id);
            $item->team = $schedule_data->team;
            $item->location = $schedule_data->location;
            $item->status = $schedule_data->status;
            $reservation_data = Reservation::find($item->reservation_id);
            $item->r_date = $reservation_data->r_date;
            $item->r_type = $reservation_data->r_type;
        });

        return view('admin-schedule-setting',compact('approved','r_id','schedule'),
        ['metaTitle'=>'Scheduler Page | Admin Panel',
        'metaHeader'=>'Schedule of Events']);
    }

    public function settingSchedule(Request $request)
    {
        $team_schedule = ScheduleEvent::create([
            'team' => $request->tname,
            'location' => $request->location,
        ]);
        AssignScheduleReservation::create([
            'schedule_id' => $team_schedule->id,
            'reservation_id' => $request->reservation_id,
        ]);

        return back()->with('message', 'Successfully Assigned Team!');
    }

    
}
