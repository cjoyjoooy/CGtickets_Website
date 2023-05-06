<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $movies = Movie::all();
        // $movies = Movie::find($id);
        // return view('client.clientshowlistPage');
        // return view('client.clientshowlistPage',compact('movies'))->with(['id'=> $id]);
        
        
    }

    public function show($id){
        $movies = Movie::find($id);
        return view('client.clientshowlistPage', ['movies'=> Movie::findOrFail($id)]);
    }

   

   


}
