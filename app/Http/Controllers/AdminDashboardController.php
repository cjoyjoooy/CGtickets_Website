<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Schedule;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduledatas = Schedule::all();
        $schedules = Schedule::count();
        $cinemas = Cinema::count();
        $movies = Movie::count();
        return view('admin.adminDashboard', compact(['schedules', 'cinemas', 'movies','scheduledatas']));
    }

    // public function admindashboard()
    // {
    //     return view('admin.adminDashboard');
    // }
}
