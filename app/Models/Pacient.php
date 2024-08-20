<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'cns',
        'sexo',
        'comorbidade'
    ];
    use HasFactory;
}
