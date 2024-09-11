<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteIncidenteLeito extends Model
{
    use HasFactory;

    protected $table = 'paciente_incidente_leito';

    protected $fillable = [
        'id_paciente',
        'id_incidente',
        'id_leito',
        'id_status_paciente',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function incidente()
    {
        return $this->belongsTo(Incidente::class, 'id_incidente');
    }

    public function leito()
    {
        return $this->belongsTo(Leito::class, 'id_leito');
    }

    public function statusPaciente()
    {
        return $this->belongsTo(StatusPaciente::class, 'id_status_paciente');
    }
}
