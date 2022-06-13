<?php

namespace App\Http\Resources\Catalogos;

use App\JsonApi\Traits\JsonApiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SexoResource extends JsonResource
{
    use JsonApiResource;
    public function toJsonApi():array
    {
        return [
            'clave' => $this->resource->clave,
            'valor' => $this->resource->valor,
            'activo' => (int) $this->resource->activo,
        ];
    }

    public function getPrefixRoute(){
        return 'catalogos.';
    }
}
