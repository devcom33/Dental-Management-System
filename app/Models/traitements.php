<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traitements extends Model
{
    use HasFactory;
    protected $table='traitements';
    protected $primaryKey='id_traitement';
}
