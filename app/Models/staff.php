<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $primaryKey = 'staffID';

    public function schedule(){
        return $this->hasMany(Schedule::class,'staffID');
    }
}
