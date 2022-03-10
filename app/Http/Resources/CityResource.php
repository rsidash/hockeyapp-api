<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CityResource extends JsonResource
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
        unset($array['country_id']);
        unset($array['deleted_at']);
        unset($array['created_at']);
        unset($array['updated_at']);
        $array['country'] = new CityCountryResource($this->country);
        return $array;
    }
}
