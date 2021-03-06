<?php
//author:Sing Wei Hern
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    //protected $primaryKey = 'customerID';
    
    protected $fillable =[
        'firstName',
        'lastName',
        'contactNo',
        'email',
    ];
}
