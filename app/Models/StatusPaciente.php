<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPaciente extends Model
{
    use HasFactory;

    // Definindo a tabela associada
    protected $table = 'status_paciente';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'paciente_alta',
        'data_internacao',
        'data_alta'
    ];

    /**
     * Cast de atributos, útil para interpretar o valor de 'paciente_alta' como boolean
     */
    protected $casts = [
        'paciente_alta' => 'boolean',
        'data_internacao' => 'date',
        'data_alta' => 'date',
    ];

    // Relacionamentos podem ser definidos aqui se necessários
    // Por exemplo, se StatusPaciente estiver relacionado com a tabela Pacientes
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente'); // assumindo que existe a foreign key id_paciente
    }
}
