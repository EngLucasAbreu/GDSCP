<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pacientes';

    protected $fillable = [
        'nome',
        'cpf',
        'cns',
        'data_nascimento',
        'sexo',
        'evolucao',
        'id_comorbidade',
    ];

    public function comorbidade()
    {
        return $this->belongsTo(Comorbidade::class, 'id_comorbidade');
    }

    public function pacienteIncidenteSala()
    {
        return $this->hasMany(PacienteIncidenteSala::class, 'id_paciente');
    }
}
