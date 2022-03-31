<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transport
 * 
 * @property int $id
 * @property int $code
 * @property string $carType
 * @property string $carPlate
 * @property string $driverID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Transport extends Model
{
	protected $table = 'transports';

	protected $casts = [
		'code' => 'int'
	];

	protected $fillable = [
		'code',
		'carType',
		'carPlate',
		'driverID'
	];
}
