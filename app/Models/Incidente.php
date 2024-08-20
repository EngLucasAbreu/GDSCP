<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'incidentes';

    protected $fillable = [
        'data_internacao',
        'saida',
        'id_lesao',
        'id_tratamento',
        'descricao',
    ];

    public function lesao()
    {
        return $this->belongsTo(Lesao::class, 'id_lesao');
    }

    public function tratamento()
    {
        return $this->belongsTo(Tratamento::class, 'id_tratamento');
    }

    public function pacienteIncidenteSala()
    {
        return $this->hasMany(PacienteIncidenteSala::class, 'id_incidente');
    }
}
