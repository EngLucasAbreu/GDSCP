<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lesoes';

    protected $fillable = [
        'tipo_lesao',
        'local_lesao',
    ];

    public function incidentes()
    {
        return $this->hasOne(Incidente::class, 'id_lesao');
    }
}
