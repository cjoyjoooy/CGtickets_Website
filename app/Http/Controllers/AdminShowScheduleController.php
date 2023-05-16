<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Support\Facades\Redirect;

class adminShowScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
        public function index()
        {
            $schedules = Schedule::with('movie')
                ->whereNull('deleted_at')
                ->get();
        
            return view('admin.adminShowSchedule', compact('schedules'));
        }
    

    public function addSchedule(){
        $locations = Location::all();
        $cinemas = Cinema::all();
        $movies = Movie::all();
        return view('admin.ScheduleAdd', compact(['locations', 'cinemas', 'movies']));
    }

    public function insertSchedule(Request $request){
        // insert code sa add/insert diri hihi 
        // any variable = new Modelname 
        $scheduledata = new Schedule;

        //variable->table comlumn name = $request-> name sa input box
        $scheduledata->location_id = $request->location;
        $scheduledata->cinema_id = $request->cinema;
        $scheduledata->movie_id = $request->movie;
        $scheduledata->time_start = $request->timeStart;
        $scheduledata->time_end = $request->timeEnd;
        $scheduledata->date_schedule = $request->showdate;
        $scheduledata->price = $request->price;
        // save() -- insert data into the database 
        $scheduledata->save();
        // return siya balik sa page 
        return redirect('AdminShowSchedule');
        
    }


    public function editSchedule($id){
        $locations = Location::all();
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $scheduledata = Schedule::find($id);
        return view('admin.ScheduleEdit', compact(['locations', 'cinemas', 'movies','scheduledata']));
    }

    public function updateSchedule(Request $request, $id){
         // insert code sa edit/update diri hihi 
        $scheduledata= Schedule::find($id);
        $scheduledata->location_id = $request->location;
        $scheduledata->cinema_id = $request->cinema;
        $scheduledata->movie_id = $request->movie;
        $scheduledata->time_start = $request->timeStart;
        $scheduledata->time_end = $request->timeEnd;
        $scheduledata->date_schedule = $request->showdate;
        $scheduledata->price = $request->price;
        // save() -- insert data into the database 
        $scheduledata->update();
        // return siya balik sa page 
        return redirect('AdminShowSchedule');

    }
    public function deleteSchedule($id){
        $deleteschedule = Schedule::withTrashed()->find($id);

        if ($deleteschedule === null) {
            return redirect()->back()->with('error', 'Movie not found');
        }
        if($deleteschedule->trashed()){
            $deleteschedule->forceDelete();
            return redirect()->back()->with('success', 'Schedule deleted successfully.');
        }
        $deleteschedule->delete();
        return redirect()->back()->with('success', 'Schedule deleted successfully.');;
    }

    public function scheduleRestore($id)
{
    $scheduleRestore = Schedule::with(['movie' => function ($query) {
        $query->withTrashed();
    }])->withTrashed()->find($id);

    if ($scheduleRestore === null) {
        return redirect()->back()->with('error', 'Schedule not found');
    } elseif (!$scheduleRestore->trashed()) {
        return redirect()->back()->with('error', 'Schedule is not soft deleted');
    } elseif ($scheduleRestore->movie && $scheduleRestore->movie->trashed()) {
        return redirect()->back()->with('error', 'Associated movie is still trashed');
    }

    $scheduleRestore->restore();
    return redirect()->back()->with('success', 'Schedule restored successfully.');
}

    public function scheduleArchive()
{
    $schedules = Schedule::onlyTrashed()
        ->whereNotNull('deleted_at')
        ->with(['movie' => function ($query) {
            $query->withTrashed();
        }])
        ->get();

    return view('admin.ScheduleArchive', compact('schedules'));
}   
}
