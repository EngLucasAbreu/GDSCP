<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorLeitoStatus extends Model
{
    use HasFactory;
    protected $table = 'setor_leito_status';

    protected $fillable = [
        'id_setor',
        'id_leito',
        'leito_status',

    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'id_setor');
    }

    public function leito()
    {
        return $this->belongsTo(Leito::class, 'id_leito');
    }

}
