<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('ice_rinks')->ignore($this->team),
            ],
            'description' => 'nullable|string|max:10000',
            'image_id' => 'nullable|numeric|exists:images,id,deleted_at,NULL',
//            'owner_id' => 'nullable|numeric|exists:users,id,deleted_at,NULL',
            'owner_id' => 'nullable|numeric|exists:users,id',
            'city_id' => 'required|numeric|exists:cities,id,deleted_at,NULL',
        ];
    }
}
