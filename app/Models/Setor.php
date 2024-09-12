<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'setores';

    protected $fillable = [
        'nome_setor',
    ];


    public function pacienteIncidenteSetor()
    {
        return $this->hasMany(PacienteIncidenteLeito::class, 'id_setor');
    }
}
