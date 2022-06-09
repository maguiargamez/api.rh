<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CSexo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_sexos';

    protected $attributes = [
        'activo' => 1
    ];

    protected $fillable = [
        'clave',
        'valor'
    ];

    public $resourceType = 'sexos';

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeClave(Builder $query, clave)
    {
        $query->where('clave', $clave);
    }
}
