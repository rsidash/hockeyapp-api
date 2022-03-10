<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        unset($array['deleted_at']);
        unset($array['created_at']);
        unset($array['updated_at']);
        //$array['cities_en'] =  $this->cities->implode('name_en', ', ');
        //$array['cities_ru'] =  $this->cities->implode('name_ru', ', ');
        $array['cities'] = CountryCityResource::collection($this->cities);
        return $array;
    }
}
