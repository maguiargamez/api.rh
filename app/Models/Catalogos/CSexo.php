<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSexo extends Model
{
    use HasFactory;
    protected $table = 'c_sexos';

    protected $fillable = [
        'clave',
        'valor'
    ];
}
