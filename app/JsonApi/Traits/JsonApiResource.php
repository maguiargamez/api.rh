<?php

namespace App\JsonApi\Traits;

trait JsonApiResource
{
    abstract public function toJsonApi(): array;
    public function toArray($request)
    {
        //dd($this->resource->getRouteKey());
        return [
            'type' => $this->getResourceType(),
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => $this->filterAttributes($this->toJsonApi()),
            'links' => [
                'self' => route('api.v1.'.$this->getPrefixRoute().$this->getResourceType().'.show', $this->resource->getRouteKey())
            ]
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header(
            'Location',
            route('api.v1.'.$this->getPrefixRoute().$this->getResourceType().'.show', $this->resource)
        );
    }

    private function filterAttributes(array $attributes): array
    {
        return array_filter(
            $attributes
            , function($value){
            if(request()->isNotFilled('fields')){
                return true;
            }

            $fields = explode(',', request('fields.'.$this->getResourceType()));

            if($value === $this->getRouteKey()){
                return in_array($this->getRouteKeyName(), $fields);
            }
            return $value;
        });
    }
}
