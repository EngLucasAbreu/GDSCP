<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tratamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tratamentos';

    protected $fillable = [
        'tipo_tratamento',
    ];

    public function incidentes()
    {
        return $this->hasOne(Incidente::class, 'id_tratamento');
    }
}
