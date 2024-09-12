<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'leitos';

    protected $fillable = [
        'tipo_leito',
        'id_setor',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'id_setor');
    }

    public function setores()
    {
        return $this->hasOne(Setor::class, 'id_setor');
    }
}
