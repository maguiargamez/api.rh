<?php

namespace App\Models\Catalogos;

use App\Models\OrganoAdministrativo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTipoOrganoAdministrativo extends Model
{
    use HasFactory;

    protected $table = 'c_tipos_organos_administrativos';

    protected $fillable = [
        'valor'
    ];
}
