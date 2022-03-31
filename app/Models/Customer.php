<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $CustomerID
 * @property string $CustomerCode
 * @property string $CustomerName
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	protected $primaryKey = 'CustomerID';

	protected $fillable = [
		'CustomerCode',
		'CustomerName'
	];
}
