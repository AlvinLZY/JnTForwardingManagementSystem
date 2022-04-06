<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'scheduleID';

    public function staff(){
        return $this->belongsTo(staff::class,'driverID');
    }

    public function Transport(){
        return $this->belongsTo(Transport::class,'transportID');
    }

    public function Region(){
        return $this->belongsTo(Region::class,'destRegionID');
    }
}
