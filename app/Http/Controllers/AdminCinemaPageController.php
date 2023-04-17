<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class adminCinemaPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        // display location data into the table  
        $locations = Location::all();
        return view('admin.adminCinemaPage',compact('locations'));
    }
     

    
    public function addLocation(Request $request){
        // any variable = new Modelname 
        $locationdata = new Location;

        //variable->table comlumn name = $request-> name sa input box
        $locationdata->location_name=$request->location_name;
       
        // save() -- insert data into the database 
        $locationdata->save();
        // return siya balik sa page 
        return redirect()-> back();
      
    }
  
}
