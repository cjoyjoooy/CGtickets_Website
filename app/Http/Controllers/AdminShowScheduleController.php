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
        return view('admin.ScheduleEdit', compact(['locations', 'cinemas', 'movies']));
    }

    public function updateSchedule(Request $request, $id){
         // insert code sa edit/update diri hihi 
        $updatesched-> Schedule::find($id);
        $updatesched->location_id = $request->location;
        $updatesched->cinema_id = $request->cinema;
        $updatesched->movie_id = $request->movie;
        $updatesched->time_start = $request->timeStart;
        $updatesched->time_end = $request->timeEnd;
        $updatesched->date_schedule = $request->showdate;
        $updatesched->price = $request->price;
        // save() -- insert data into the database 
        $updatesched->update();
        // return siya balik sa page 
        return redirect('AdminShowSchedule');

    }
    public function deleteSchedule($id){
        $deleteschedule = new Schedule;
        $deleteschedule = Schedule::find($id);
        $deleteschedule->delete();
        return redirect()->back();
    }

}
