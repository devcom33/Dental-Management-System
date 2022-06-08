<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_D extends Model
{
    use HasFactory;
    //protected $primaryKey = 'id';
    protected $fillable = [
		'status', 'start', 'end','NomP','NomD'
	];
}
