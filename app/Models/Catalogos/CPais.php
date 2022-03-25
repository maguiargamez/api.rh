<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPais extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_paises';

    protected $fillable = [
        'clave',
        'valor',
        'nacionalidad',
    ];

    // //Relación uno a muchos
    // public function entidadesFederativas()
    // {
    //     return $this->hasMany(CEntidadFederativa::class);
    // }
}
