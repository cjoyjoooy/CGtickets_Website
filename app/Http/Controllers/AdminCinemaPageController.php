<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
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
        $cinemas = Cinema::all();
        return view('admin.adminCinemaPage', compact(['locations', 'cinemas']));
    }

    // LOCATION --------------------
    public function addLocation(Request $request)
    {
        return view('admin.LocationAdd');
    }
    public function insertLocation(Request $request)
    {
        // any variable = new Modelname 
        $locationdata = new Location;

        //variable->table comlumn name = $request-> name sa input box
        $locationdata->location_name = $request->location_name;

        // save() -- insert data into the database 
        $locationdata->save();
        // return siya balik sa page 
        return redirect('AdminCinema');

    }

    public function deleteLocation($id)
    {   $deletelocation = new Location;
        //  variable = model/table name::find($id); 
        $deletelocation = Location::find($id);
        $deletelocation->delete();
        return redirect()->back();
    }
    

    public function editLocation($id)
    {   
        // redirect sa edit page with id 
        $locationdata = Location::find($id);
        return view('admin.LocationEdit', compact('locationdata'));
    }

    public function updateLocation(Request $request, $id){
        $locationdata = Location::find($id);
        $locationdata->location_name=$request->location_name;
        $locationdata->save();
        return redirect('AdminCinema');
    }

    // CINEMA -------------------
    public function addCinema(Request $request)
    {
        $locations = Location::all();
        return view('admin.CinemaAdd',compact('locations'));
    }


    public function insertCinema(Request $request)
    {
        $cinemadata = new Cinema;
        $cinemadata->location_id = $request->location;
        $cinemadata->cinema_number = $request->cinema_num;
        $cinemadata->seat_number = $request->seat_num;
        $cinemadata->save();
        return redirect('AdminCinema');
    }

    public function editCinema($id)
    {
        $locations = Location::all();
        $cinemadata = Cinema::find($id);
        return view('admin.CinemaEdit',compact(['cinemadata','locations']));

    }

    public function updateCinema(Request $request, $id){
        $cinemadata = Cinema::find($id);
        $cinemadata->location_id = $request->location;
        $cinemadata->cinema_number = $request->cinema_num;
        $cinemadata->seat_number = $request->seat_num;
        $cinemadata->save();
        return redirect('AdminCinema');
    }

    public function deleteCinema($id)
    {   $cinemadata = new Cinema;
        $cinemadata = Cinema::find($id);
        $cinemadata->delete();
        return redirect()->back();
    }

    

}
