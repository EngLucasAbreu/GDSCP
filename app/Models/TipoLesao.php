<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoLesao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_lesoes';
    protected $fillable = [
        'descricao_lesao',
    ];

    public function lesoes()
    {
        return $this->hasMany(Lesao::class);
    }
}
