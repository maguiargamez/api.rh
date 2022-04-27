<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPais extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_paises';

    // protected $cast = [
    //     'id' =>
    // ];

    protected $attributes = [
        'activo' => 1
     ];

    protected $fillable = [
        'clave',
        'valor',
        'nacionalidad',
        'created_at'
    ];

    // //Relación uno a muchos
    // public function entidadesFederativas()
    // {
    //     return $this->hasMany(CEntidadFederativa::class);
    // }

    public $resourceType = 'c_paises';

    public function getRouteKeyName()
    {
        return 'id';
    }


    public function scopeYear(Builder $query, $year)
    {
        $query->whereYear('created_at', $year);
    }

    public function scopeMonth(Builder $query, $month)
    {
        $query->whereMonth('created_at', $month);
    }

    /*public function scopeClave(Builder $query, $clave)
    {
        $query->where('clave', 'LIKE', '%'.$clave.'%');
    }

    public function scopeValor(Builder $query, $valor)
    {
        $query->where('valor', 'LIKE', '%'.$valor.'%');
    }*/

}
