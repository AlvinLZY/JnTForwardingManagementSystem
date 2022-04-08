<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $table = 'delivery_orders';
    protected $primaryKey = 'orderID';
    protected $fillable = ['senderID','receiverID','totalWeight','parcelContentCategory','scheduleID'];

    public function Schedule(){
        return $this->belongsTo(Schedule::class,'scheduleID');
    }
}
