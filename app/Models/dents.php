<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dents extends Model
{
    use HasFactory;
    protected $table = 'dents';
    protected $primaryKey = 'id_dent';
     protected $fillable = [
    ];
}
