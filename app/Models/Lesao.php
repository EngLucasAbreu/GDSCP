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
        'id_tipo_lesao',
        'id_local_lesao',
    ];



    public function incidentes()
    {
        return $this->hasOne(Incidente::class, 'id_lesao');
    }

    public function tipoLesao()
    {
        return $this->belongsTo(TipoLesao::class, 'id_tipo_lesao');
    }

    public function localLesao()
    {
        return $this->belongsTo(LocalLesao::class, 'id_local_lesao');
    }
}
