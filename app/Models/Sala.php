<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'salas';

    protected $fillable = [
        'nome_sala',
        'id_leito',
    ];

    public function leito()
    {
        return $this->belongsTo(Leito::class, 'id_leito');
    }

    public function pacienteIncidenteSala()
    {
        return $this->hasMany(PacienteIncidenteLeito::class, 'id_sala');
    }
}
