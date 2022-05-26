<?php

namespace App\Http\Resources\Catalogos;

use App\JsonApi\Traits\JsonApiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PaisResource extends JsonResource
{
    use JsonApiResource;
    public function toJsonApi():array
    {
        return [
            'clave' => $this->resource->clave,
            'valor' => $this->resource->valor,
            'nacionalidad' => $this->resource->nacionalidad,
            'activo' => (int) $this->resource->activo,
        ];
    }

    public function getPrefixRoute(){
        return 'catalogos.';
    }
}
