<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;


class Schedule extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['location_id','cinema_id','movie_id','time_start','time_end','date_schedule','price'];


    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }
    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
