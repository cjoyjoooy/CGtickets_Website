<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\Movie;
use Illuminate\Http\Request;

class TicketDetailsController extends Controller
{

    public function index()
    {
        
        
    }

    public function show($id)
    {
        $scheduledatas = Schedule::find($id);
        return view('client.clientTicketDetails', compact('scheduledatas'));
    }

}
