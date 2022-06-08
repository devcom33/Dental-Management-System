<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;
    protected $table='operations';
    protected $primaryKey='id_operation';
    protected $fillable=[];
}
