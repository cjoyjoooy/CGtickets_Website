<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Transaction;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $scheduledatas = Schedule::with('movie')
            ->whereNull('deleted_at')
            ->get();
        $schedules = Schedule::count();
        $cinemas = Cinema::count();
        $movies = Movie::count();
        // Retrieve daily sales
        $today = Carbon::today();
    $dailySales = Transaction::whereDate('created_at', $today)->sum('total');

    return view('admin.adminDashboard', compact(['schedules', 'cinemas', 'movies','scheduledatas', 'dailySales']));
    }

    // public function admindashboard()
    // {
    //     return view('admin.adminDashboard');
    // }
}
