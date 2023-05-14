<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            return redirect('AdminMovie') -> with('success', 'Movie added successfully.');      
    }
    public function editMovie($id)
    {
        $moviedata = Movie::find($id);
        return view('admin.MovieEdit', compact(['moviedata']));
    }

    public function updateMovie(Request $request, $id)
    {

        //insert code sa edit/update diri hihi 
        $moviedata = Movie::find($id);
        $moviedata->MovieTitle = $request->title;
        $moviedata->MovieDescription = $request->description;
        $moviedata->Genre = $request->genre;
        if ($request->hasFile('moviePoster')){
            $file = $request->file('moviePoster');
            $request->validate([
                'moviePoster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imagename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads',$imagename);
            $moviedata->MoviePoster = $imagename;
        }
        if($moviedata){
            $moviedata->update();
            return redirect(url('AdminMovie'))-> with('success', 'Movie Updated successfully.');
        }else{
            return back()-> with('fail', 'Movie Updated Unsuccessfully.');
        }

        
    }
    public function deletemovie($id)
    {  
        // $movie = Movie::withTrashed()->find($id);
        $deletemovie = Movie::withTrashed()->find($id);
        //  variable = model/table name::find($id); 
        if ($deletemovie === null) {
            return redirect()->back()->with('error', 'Movie not found');
        }
        if($deletemovie->trashed()){
            $deletemovie->forceDelete();
            return redirect()->back()-> with('success', 'Movie deleted successfully.');
        }
        $deletemovie->delete();
        return redirect()->back()-> with('success', 'Movie moved to archive.');
    }
    public function movieRestore($id){
        $restoremovie = Movie::withTrashed()->find($id);
        if ($restoremovie === null){
            return redirect()->back()->with('error', 'Movie not found');
        }
        else if (!$restoremovie->trashed()){
            return redirect()->back()->with('error', 'Movie is not soft deleted');
        }
        else{
            $restoremovie->restore();
            return redirect()->back()-> with('success', 'Movie restored successfully.');
        }
    }

    public function movieArchive(){
        $movies = Movie::onlyTrashed()->get();
        
        return view('admin.MovieArchive', compact('movies'));
    }

}
