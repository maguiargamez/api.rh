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
        'valor'.
        'created_at'
    ];

    public $resourceType = 'sexos';

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeClave(Builder $query, $clave)
    {
        $query->where('clave', $clave);
    }

    public function scopeYear(Builder $query, $year)
    {
        $query->whereYear('created_at', $year);
    }

    public function scopeMonth(Builder $query, $month)
    {
        $query->whereMonth('created_at', $month);
    }
}
