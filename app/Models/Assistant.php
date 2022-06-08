<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory;
    protected $table = 'assistant';
    protected $primaryKey = 'id_assistant';
    protected $fillable = [
        'id_assistant',
        'Nom',
        'Prenom',
        'Sexe',
        'Phone',
        'Email',
        'Password',
        'fk_admin',
        'fk_doctor'
];
}
