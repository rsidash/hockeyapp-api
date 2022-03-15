<?php

namespace App\Http\Requests\CityRequests;

use Illuminate\Foundation\Http\FormRequest;

class CityIndexRequest extends FormRequest
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
            'sort' => 'nullable|string|in:id,name_en,name_ru,country_id',
            'order' => 'nullable|in:asc,desc',
            'id' => 'nullable|integer',
            'name_en' => 'nullable|string|regex:/^[a-zA-Z-]+$/u',
            'name_ru' => 'nullable|string|regex:/^[а-яА-Я-]+$/u',
            'country_id' => 'nullable|integer|exists:countries,id,deleted_at,NULL'
        ];
    }
}
