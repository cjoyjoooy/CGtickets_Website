<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }
}
