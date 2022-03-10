<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityCountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        unset($array['deleted_at']);
        unset($array['created_at']);
        unset($array['updated_at']);

        return $array;
    }
}
