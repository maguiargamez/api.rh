<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMunicipio extends Model
{
    use HasFactory;
    protected $table = 'c_municipios';

    protected $fillable = [
        'id_c_entidad_federativa',
        'clave',
        'valor'
    ];
}
