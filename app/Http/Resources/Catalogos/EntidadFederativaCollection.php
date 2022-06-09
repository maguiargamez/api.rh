<?php

namespace App\Http\Resources\Catalogos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EntidadFederativaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => route('api.v1.catalogos.entidades-federativas.index')
            ]
        ];
    }
}
