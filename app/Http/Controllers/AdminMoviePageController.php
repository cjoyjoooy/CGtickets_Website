<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Schedule;
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

    public function insertMovie(Request $request)
{
    // Validate the uploaded image
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Create a new instance of the Movie model
    $moviedata = new Movie;

    // Assign values to the object's properties from the request data
    $moviedata->MovieTitle = $request->title;
    $moviedata->MovieDescription = $request->description;
    $moviedata->Genre = $request->genre;

    // Move the uploaded image to the 'uploads' directory
    $imagename = time().'.'.$request->image->extension();
    if ($request->image->move('uploads', $imagename)) {
        // Set the image filename to the MoviePoster property
        $moviedata->MoviePoster = $imagename;

        // Save the movie data
        if ($moviedata->save()) {
            return redirect('AdminMovie')->with('success', 'Movie added successfully.');
        } else {
            return back()->with('fail', 'Movie added unsuccessfully.');
        }
    } else {
        return back()->with('fail', 'Failed uploading the image.');
    }
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
        if($moviedata->update()){    
            return redirect(url('AdminMovie'))-> with('success', 'Movie Updated successfully.');
        }else{
            return back()-> with('fail', 'Movie Updated Unsuccessfully.');
        }

        
    }
    public function deletemovie($id)
    {
        $deletemovie = Movie::withTrashed()->find($id);
    
        if ($deletemovie === null) {
            return redirect()->back()->with('error', 'Movie not found');
        }
    
        // Trash the schedules if the movie is trashed
        if ($deletemovie->trashed()) {
            $schedules = Schedule::where('movie_id', $deletemovie->id)->get();
            foreach ($schedules as $schedule) {
                $schedule->delete();
            }
            $deletemovie->forceDelete();
            return redirect('AdminMovie')->with('success', 'Movie and associated schedules deleted successfully.');
        }
    
        // Delete the schedules if the movie is not trashed
        $schedules = Schedule::where('movie_id', $deletemovie->id)->get();
        foreach ($schedules as $schedule) {
            $schedule->delete();
        }
    
        $deletemovie->delete();
        return redirect('AdminMovie')->with('success', 'Movie and associated schedules moved to archive.');
    }
    public function movieRestore($id)
    {
        $restoremovie = Movie::withTrashed()->find($id);
    
        if ($restoremovie === null) {
            return redirect()->back()->with('error', 'Movie not found');
        } elseif (!$restoremovie->trashed()) {
            return redirect()->back()->with('error', 'Movie is not soft deleted');
        } else {
            $restoremovie->restore();
    
            // Restore the associated schedules
            $schedules = Schedule::withTrashed()->where('movie_id', $restoremovie->id)->get();
            foreach ($schedules as $schedule) {
                $schedule->restore();
            }
    
            return redirect()->back()->with('success', 'Movie and associated schedules restored successfully.');
        }
    }

    public function movieArchive(){
        $movies = Movie::onlyTrashed()->get();
        
        return view('admin.MovieArchive', compact('movies'));
    }
    public function movieSearch(){
        $movies = Movie::select('MovieTitle')->get();
        $data = [];

        foreach ($movies as $movie){
            $data[] = $movie['MovieTitle'];
        }

        return response()->json($data);
        }
    
    public function searchmovie(Request $request){
        $searchmovie=$request->searchmovie;

        if($searchmovie != ""){
            $movies = Movie::where("MovieTitle", "LIKE", "%$searchmovie%")->get();
            return view('admin.adminMoviesPage', compact('movies'));
        }
        else{
            return redirect()->back();
        }
    }
}


