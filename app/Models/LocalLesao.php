<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalLesao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'local_lesoes';
    protected $fillable = [
        'regiao_lesao',
    ];



    public function lesoes()
    {
        return $this->hasMany(Lesao::class);
    }
}
