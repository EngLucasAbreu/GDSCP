<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comorbidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comorbidades';

    protected $fillable = [
        'tipo_comorbidade',
    ];

    public function pacientes()
    {
        return $this->hasOne(Paciente::class, 'id_comorbidade');
    }
}
