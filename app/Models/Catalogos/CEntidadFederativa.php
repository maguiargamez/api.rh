<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CEntidadFederativa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_entidades_federativas';

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = [
        'id_c_pais',
        'clave',
        'abrev',
        'valor'
    ];

    public $resourceType = 'entidades-federativas';

    public function getRouteKeyName()
    {
        return 'id';
    }

    //Relación uno a muchos inversa
    /*public function pais()
    {
        return $this->belongsTo(CPais::class);
    }*/
}
