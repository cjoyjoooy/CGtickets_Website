<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movieIds = Schedule::distinct('movie_id')->pluck('movie_id');
        $movies = Movie::whereIn('id', $movieIds)->get();

        return view('client.clientHomePage', compact('movies'));
    }
}
