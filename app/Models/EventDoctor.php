<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDoctor extends Model
{
    use HasFactory;
    protected $fillable = [
		'status', 'start', 'end','NomP','NomD'
	];
}
