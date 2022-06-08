<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $primaryKey = 'id_patient';
    protected $fillable = [
           'Nom',
           'Prenom',
           'DateNaissance',
           'Sexe',
           'Adresse',
           'Phone',
           'Email',
           'Assurance',
           'fk_assistant',
           'fk_doctor',
        
   ];
}
