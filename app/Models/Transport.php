<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $primaryKey = 'transportID';

    public function schedule(){
        return $this->hasMany(Schedule::class,'transportID');
    }
}
