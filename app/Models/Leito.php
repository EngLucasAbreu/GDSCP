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
    ];

    public function salas()
    {
        return $this->hasOne(Sala::class, 'id_leito');
    }
}
