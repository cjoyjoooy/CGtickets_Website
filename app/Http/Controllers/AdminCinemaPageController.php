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
        $locationdata = new Location;
        $locationdata->location_name = $request->location_name;
        if ($locationdata->save()) {
            // Data inserted successfully
            return redirect('AdminCinema')->with('success', 'Location added successfully.');
        } else {
            // Failed to insert data
            return redirect('AdminCinema')->with('error', 'Failed to add location.');
        }
    }

    public function deleteLocation($id)
    {
        $deletelocation = Location::find($id);
        if ($deletelocation->delete()) {
            // Data deleted successfully
            return redirect()->back()->with('success', 'Location deleted successfully.');
        } else {
            // Failed to delete data
            return redirect()->back()->with('error', 'Failed to delete location.');
        }
    }


    public function editLocation($id)
    {
        // redirect sa edit page with id 
        $locationdata = Location::find($id);
        return view('admin.LocationEdit', compact('locationdata'));
    }

    public function updateLocation(Request $request, $id)
    {
        $locationdata = Location::find($id);
        $locationdata->location_name = $request->location_name;
        if ($locationdata->save()) {
            // Data updated successfully
            return redirect('AdminCinema')->with('success', 'Location updated successfully.');
        } else {
            // Failed to update data
            return redirect('AdminCinema')->with('error', 'Failed to update location.');
        }
    }

    // CINEMA -------------------
    public function addCinema(Request $request)
    {
        $locations = Location::all();
        return view('admin.CinemaAdd', compact('locations'));
    }


    public function insertCinema(Request $request)
    {

        $validatedData = $request->validate([
            'seat_num' => 'required|numeric',
        ]);
    
        $cinemadata = new Cinema;
        $cinemadata->location_id = $request->location;
        $cinemadata->cinema_number = $request->cinema_num;
        $cinemadata->seat_number = $validatedData['seat_num'];

        if ($cinemadata->save()) {
            // Data inserted successfully
            return redirect('AdminCinema')->with('success', 'Cinema added successfully.');
        } else {
            // Failed to insert data
            return redirect('AdminCinema')->with('error', 'Failed to add cinema.');
        }
    }

    public function editCinema($id)
    {
        $locations = Location::all();
        $cinemadata = Cinema::find($id);
        return view('admin.CinemaEdit', compact(['cinemadata', 'locations']));
    }
    public function updateCinema(Request $request, $id)
    {
        $validatedData = $request->validate([
            'seat_num' => 'required|numeric',
        ]);
        $cinemadata = Cinema::find($id);
        $cinemadata->location_id = $request->location;
        $cinemadata->cinema_number = $request->cinema_num;
        $cinemadata->seat_number = $validatedData['seat_num'];
        if ($cinemadata->save()) {
            // Data updated successfully
            return redirect('AdminCinema')->with('success', 'Cinema updated successfully.');
        } else {
            // Failed to update data
            return redirect('AdminCinema')->with('error', 'Failed to update cinema.');
        }
    }

    public function deleteCinema($id)
    {
        $cinemadata = Cinema::find($id);
        if ($cinemadata->delete()) {
            // Data deleted successfully
            return redirect()->back()->with('success', 'Cinema deleted successfully.');
        } else {
            // Failed to delete data
            return redirect()->back()->with('error', 'Failed to delete cinema.');
        }
    }

}
