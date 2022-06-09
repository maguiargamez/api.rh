<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRelacionLaboral extends Model
{
    use HasFactory;
    protected $table = 'c_relaciones_laborales';

    protected $fillable = [
        'clave',
        'valor'
    ];
}
