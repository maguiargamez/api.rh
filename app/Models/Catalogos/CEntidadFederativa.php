<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CEntidadFederativa extends Model
{
    use HasFactory;
    protected $table = 'c_entidades_federativas';

    protected $fillable = [
        'id_c_pais',
        'clave',
        'abrev',
        'valor'
    ];

    //Relación uno a muchos inversa
    public function pais()
    {
        return $this->belongsTo(CPais::class);
    }
}
