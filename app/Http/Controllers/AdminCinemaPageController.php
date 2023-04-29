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
        // any variable = new Modelname 
        $locationdata = new Location;

        //variable->table comlumn name = $request-> name sa input box
        $locationdata->location_name = $request->location_name;

        // save() -- insert data into the database 
        $locationdata->save();
        // return siya balik sa page 
        return redirect()->back();
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
        $cinemadata = new Cinema;
        $cinemadata->cinema_number = $request->cinema_num;
        $cinemadata->seat_number = $request->seat_num;
        $cinemadata->save();
        return redirect()->back();
    }

    public function editCinema($id)
    {
        $cinemadata = Cinema::find($id);
        return view('admin.CinemaEdit',compact('cinemadata'));

    }

    public function updateCinema(Request $request, $id){
        $cinemadata = Cinema::find($id);
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
