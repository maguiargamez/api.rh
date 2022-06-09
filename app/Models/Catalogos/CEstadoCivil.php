<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CEstadoCivil extends Model
{
    use HasFactory;
    protected $table = 'c_estados_civiles';

    protected $fillable = [
        'clave',
        'valor'
    ];
}
