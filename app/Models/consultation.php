<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    use HasFactory;
    protected $table='consultation';
    protected $primaryKey='id_consultation';
    protected $fillable=[
        'visite_suivant',
    ];
}
