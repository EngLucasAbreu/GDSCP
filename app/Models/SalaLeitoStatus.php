<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaLeitoStatus extends Model
{
    use HasFactory;
    protected $table = 'sala_leito_status';

    protected $fillable = [
        'id_sala',
        'id_leito',
        'leito_status',

    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    public function leito()
    {
        return $this->belongsTo(Leito::class, 'id_leito');
    }

}
