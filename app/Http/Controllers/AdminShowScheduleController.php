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
        return view('admin.adminShowSchedule');
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


    public function editSchedule(){
        return view('admin.ScheduleEdit');
    }

    public function updateSchedule(){
         // insert code sa edit/update diri hihi 
    }

}
