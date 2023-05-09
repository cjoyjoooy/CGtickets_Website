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
        $schedules = Schedule::all();
        return view('admin.adminShowSchedule', compact(['schedules']));
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
            return redirect()->back();
        }
        $deleteschedule->delete();
        return redirect()->back();
    }

    public function scheduleRestore($id){
        $scheduleRestore = Schedule::withTrashed()->find($id);
        if ($scheduleRestore === null){
            return redirect()->back()->with('error', 'Movie not found');
        }
        else if (!$scheduleRestore->trashed()){
            return redirect()->back()->with('error', 'Movie is not soft deleted');
        }
        else{
            $scheduleRestore->restore();
            return redirect()->back();
        }
    }

    public function scheduleArchive(){
        $schedules = Schedule::onlyTrashed()->get();
        return view('admin.ScheduleArchive', compact(['schedules']));
    }
}
