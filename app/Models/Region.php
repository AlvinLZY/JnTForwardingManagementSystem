<?php
//author:Alvin Lim
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $primaryKey = 'regionID';

    public function schedule(){
        return $this->hasMany(Schedule::class,'regionID');
    }
}
