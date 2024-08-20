<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteIncidenteSala extends Model
{
    use HasFactory;

    protected $table = 'paciente_incidente_sala';

    protected $fillable = [
        'id_paciente',
        'id_incidente',
        'id_sala',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function incidente()
    {
        return $this->belongsTo(Incidente::class, 'id_incidente');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }
}
