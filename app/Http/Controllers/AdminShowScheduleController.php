<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class adminShowScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
        public function index()
        {
            $schedules = Schedule::with('movie')
                ->whereNull('deleted_at')
                ->get();
        
            return view('admin.adminShowSchedule', compact('schedules'));
        }
    

    public function addSchedule(){
        $locations = Location::all();
        $cinemas = Cinema::all();
        $movies = Movie::all();
        return view('admin.ScheduleAdd', compact(['locations', 'cinemas', 'movies']));
    }

    public function insertSchedule(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0',
            // Add more validation rules for other fields if needed
        ]);
    
        $locationId = $request->location;
        $cinemaId = $request->cinema;
        $movieId = $request->movie;
        $timeStart = $request->timeStart;
        $timeEnd = $request->timeEnd;
        $dateSchedule = $request->showdate;
    
        // Check if there is existing data with the same combination
        $existingSchedule = Schedule::where('location_id', $locationId)
            ->where('cinema_id', $cinemaId)
            ->where('date_schedule', $dateSchedule)
            ->where(function ($query) use ($timeStart, $timeEnd) {
                $query->whereBetween('time_start', [$timeStart, $timeEnd])
                    ->orWhereBetween('time_end', [$timeStart, $timeEnd])
                    ->orWhere(function ($query) use ($timeStart, $timeEnd) {
                        $query->where('time_start', '<=', $timeStart)
                            ->where('time_end', '>=', $timeEnd);
                    });
            })
            ->first();
    
            if ($existingSchedule) {
                return redirect()->back()->withInput()->with('error', 'Schedule already exists.');
            }
    
        $scheduleData = new Schedule;
    
        $scheduleData->location_id = $locationId;
        $scheduleData->cinema_id = $cinemaId;
        $scheduleData->movie_id = $movieId;
        $scheduleData->time_start = $timeStart;
        $scheduleData->time_end = $timeEnd;
        $scheduleData->date_schedule = $dateSchedule;
        $scheduleData->price = $validatedData['price'];
    
        if ($scheduleData->save()) {
            return redirect('AdminShowSchedule')->with('success', 'Schedule added successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to add schedule.']);
        }
    }
    


    public function editSchedule($id){
        $locations = Location::all();
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $scheduledata = Schedule::find($id);
        return view('admin.ScheduleEdit', compact(['locations', 'cinemas', 'movies','scheduledata']));
    }

    public function updateSchedule(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric|min:0',
            // Add more validation rules for other fields if needed
        ]);
    
        $scheduleData = Schedule::find($id);
        if (!$scheduleData) {
            return redirect()->back()->withErrors(['error' => 'Schedule not found.']);
        }
    
        $locationId = $request->location;
        $cinemaId = $request->cinema;
        $movieId = $request->movie;
        $timeStart = $request->timeStart;
        $timeEnd = $request->timeEnd;
        $dateSchedule = $request->showdate;
    
        // Check if there is existing data with the same combination
        $existingSchedule = Schedule::where('id', '!=', $id)
            ->where('location_id', $locationId)
            ->where('cinema_id', $cinemaId)
            ->where('date_schedule', $dateSchedule)
            ->where(function ($query) use ($timeStart, $timeEnd) {
                $query->whereBetween('time_start', [$timeStart, $timeEnd])
                    ->orWhereBetween('time_end', [$timeStart, $timeEnd])
                    ->orWhere(function ($query) use ($timeStart, $timeEnd) {
                        $query->where('time_start', '<=', $timeStart)
                            ->where('time_end', '>=', $timeEnd);
                    });
            })
            ->first();
    
        if ($existingSchedule) {
            return redirect()->back()->withInput()->with('error', 'Schedule already exists.');
        }
    
        $scheduleData->location_id = $locationId;
        $scheduleData->cinema_id = $cinemaId;
        $scheduleData->movie_id = $movieId;
        $scheduleData->time_start = $timeStart;
        $scheduleData->time_end = $timeEnd;
        $scheduleData->date_schedule = $dateSchedule;
        $scheduleData->price = $validatedData['price'];
    
        if ($scheduleData->save()) {
            return redirect('AdminShowSchedule')->with('success', 'Schedule updated successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update schedule.']);
        }
    }
    public function deleteSchedule($id){
        $deleteschedule = Schedule::withTrashed()->find($id);

        if ($deleteschedule === null) {
            return redirect()->back()->with('error', 'Movie not found');
        }
        if($deleteschedule->trashed()){
            $deleteschedule->forceDelete();
            return redirect()->back()->with('success', 'Schedule deleted successfully.');
        }
        $deleteschedule->delete();
        return redirect()->back()->with('success', 'Schedule deleted successfully.');
    }

    public function scheduleRestore($id)
{
    $scheduleRestore = Schedule::with(['movie' => function ($query) {
        $query->withTrashed();
    }])->withTrashed()->find($id);

    if ($scheduleRestore === null) {
        return redirect()->back()->with('error', 'Schedule not found');
    } elseif (!$scheduleRestore->trashed()) {
        return redirect()->back()->with('error', 'Schedule is not soft deleted');
    } elseif ($scheduleRestore->movie && $scheduleRestore->movie->trashed()) {
        return redirect()->back()->with('error', 'Associated movie is still trashed');
    }

    $scheduleRestore->restore();
    return redirect()->back()->with('success', 'Schedule restored successfully.');
}

    public function scheduleArchive()
{
    $schedules = Schedule::onlyTrashed()
        ->whereNotNull('deleted_at')
        ->with(['movie' => function ($query) {
            $query->withTrashed();
        }])
        ->get();

    return view('admin.ScheduleArchive', compact('schedules'));
}   

public function schedulesearch(Request $request){
    $schedule = $request->input('searchsched');

    if ($schedule != "") {
        $schedules = Schedule::where(function ($query) use ($schedule) {
            $query->whereHas('location', function ($query) use ($schedule) {
                $query->where('location_name', 'LIKE', "%$schedule%");  
            })
            ->orWhereHas('cinema', function ($query) use ($schedule) {
                $query->where('cinema_number', 'LIKE', "%$schedule%");
            })
            ->orWhereHas('movie', function ($query) use ($schedule) {
                $query->where('MovieTitle', 'LIKE', "%$schedule%");
            })
            ->orWhere("price", "LIKE", "%$schedule%")
            ->orWhere(function ($q) use ($schedule) {
                $q->where("time_end", "LIKE", "%$schedule%")
                ->orWhere("time_start", "LIKE", "%$schedule%");});
        })
        ->get();
        return view('admin.adminShowSchedule', compact('schedules'));
    } else {
        return redirect()->back();
    }
}
}
