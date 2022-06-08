<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctor';
    protected $primaryKey = 'id_doctor';
     protected $fillable = [
            'Nom',
            'Prenom',
            'Sexe',
            'DateNaissance',
            'Adresse',
            'Phone',
            'Email',
            'Password',
    ];
}
