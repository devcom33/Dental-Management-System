<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hestory extends Model
{
    use HasFactory;
    protected $table='hestory';
    protected $primaryKey='id_hestory';
    protected $fillable=[];
}
