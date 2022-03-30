<?php

namespace App\Http\Resources\Catalogos;

use Illuminate\Http\Resources\Json\JsonResource;

class PaisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'type' => 'c_paises',
                'id' => (string) $this->resource->getRouteKey(),
                'attributes' => [
                    'clave' => $this->resource->clave,
                    'valor' => $this->resource->valor,
                    'nacionalidad' => $this->resource->nacionalidad,
                    'activo' => $this->resource->activo,
                ],
                'links' => [
                    'self' => route('api.v1.catalogos.paises.show', $this->resource->getRouteKey())
                ]
            ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->withHeaders([
            'Location' => route('api.v1.catalogos.paises.show', $this->resource)
        ]);
    }
}
