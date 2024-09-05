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
        'id_sala'
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    public function salas()
    {
        return $this->hasOne(Sala::class, 'id_leito');
    }
}
