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
        $movies = Movie::all();
        
        return view('admin.adminMoviesPage', compact('movies'));

    }

    public function addMovie()
    {
        return view('admin.MovieAdd');
    }

    public function insertMovie(Request $request){
            // any variable = new Modelname 
        $moviedata = new Movie;

        //variable->table comlumn name = $request-> name sa input box
        $moviedata-> MovieTitle = $request->title;
        $moviedata-> MovieDescription = $request->description;
        $moviedata-> Genre = $request->genre;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagename=time().'.'.$request->image->extension();
        $request->image->move('uploads',$imagename);
        $moviedata->MoviePoster =$imagename;
        $moviedata->save();
        return redirect('AdminMovie');
    }

    public function editMovie()
    {
        return view('admin.MovieEdit');
    }

    public function updateMovie(Request $request){
         // insert code sa edit/update diri hihi 
    }

    public function deleteLocation($id)
    {   $deletemovie = new Movie;
        //  variable = model/table name::find($id); 
        $deletemovie = Movie::find($id);
        $deletemovie->delete();
        return redirect()->back();
    }

}
