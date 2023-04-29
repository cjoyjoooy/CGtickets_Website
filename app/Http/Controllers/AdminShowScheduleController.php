<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.ScheduleAdd');
    }

    public function insertSchedule(){
        // insert code sa add/insert diri hihi 
    }


    public function editSchedule(){
        return view('admin.ScheduleEdit');
    }

    public function updateSchedule(){
         // insert code sa edit/update diri hihi 
    }

}
