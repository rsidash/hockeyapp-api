<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamIndexRequest extends FormRequest
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
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
            'sort' => 'nullable|string|in:id,name,description,city_id,owner_id',
            'order' => 'nullable|in:asc,desc',
            'id' => 'nullable|integer',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'city_id' => 'nullable|integer|exists:countries,id,deleted_at,NULL',
            'owner_id' => 'nullable|integer|exists:countries,id,deleted_at,NULL'
        ];
    }
}
