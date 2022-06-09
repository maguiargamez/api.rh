<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRegimenMatrimonial extends Model
{
    use HasFactory;
    protected $table = 'c_regimenes_matrimoniales';

    protected $fillable = [
        'clave',
        'valor'
    ];
}
