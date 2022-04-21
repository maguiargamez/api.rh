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
        //dd($this->resource->getRouteKey());
        return [
                'type' => 'c_paises',
                'id' => (string) $this->resource->getRouteKey(),
                'attributes' => array_filter([
                    'clave' => $this->resource->clave,
                    'valor' => $this->resource->valor,
                    'nacionalidad' => $this->resource->nacionalidad,
                    'activo' => (int) $this->resource->activo,
                ], function($value){
                    if(request()->isNotFilled('fields')){
                        return true;
                    }

                    $fields = explode(',', request('fields.paises'));

                    if($value === $this->getRouteKey()){
                        return in_array('id', $fields);
                    }
                    return $value;
                }),
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
