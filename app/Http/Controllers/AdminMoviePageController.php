<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class adminMoviePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adminMoviesPage');
    }

    public function addMovie(Request $request)
    {
        // any variable = new Modelname 
        $moviedata = new Movie;

        //variable->table comlumn name = $request-> name sa input box
        $moviedata->MovieTitle = $request->movieTitle;
        $moviedata->MovieDescription = $request->description;
        $moviedata->Genre = $request->genre;
        $image=$request->moviePoster;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->moviePoster->move('uploads',$imagename);
        $moviedata->MoviePoster =$imagename;
  
        // save() -- insert data into the database 
        $moviedata->save();
        // return siya balik sa page 
        return redirect()->back();
    }

    public function deleteLocation($id)
    {   $deletemovie = new Movie;
        //  variable = model/table name::find($id); 
        $deletemovie = Movie::find($id);
        $deletemovie->delete();
        return redirect()->back();
    }

}
