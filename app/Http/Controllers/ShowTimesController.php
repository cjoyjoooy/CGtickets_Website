<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ShowTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('client.clientshowlistPage');
    }
    public function show($id)
    {
        $movies = Movie::find($id);

        $locationIds = Schedule::where('movie_id', $id)
            ->distinct('location_id')
            ->pluck('location_id');
        $locationNames = Location::whereIn('id', $locationIds)->get();

        $dates = Schedule::whereIn('location_id', $locationIds)
            ->select('date_schedule','location_id')
            ->distinct('date_schedule')
            ->where('movie_id', $id)
            ->get();
        $schedules = Schedule::whereIn('location_id', $locationIds)
            ->select('date_schedule','time_start','location_id','id')
            ->where('movie_id', $id)
            ->get();
        return view('client.clientshowlistPage', compact('movies', 'locationIds', 'schedules', 'locationNames','dates'));
    }
}
