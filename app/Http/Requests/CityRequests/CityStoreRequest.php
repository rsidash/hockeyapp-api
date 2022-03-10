<?php

namespace App\Http\Requests\CityRequests;

use Illuminate\Foundation\Http\FormRequest;

class CityStoreRequest extends FormRequest
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
        $country_id = $this->request->get('country_id');

        return [
            'name_en' => 'required|string|regex:/^[a-zA-Z-]+$/u|max:100|unique:cities,name_en,' .  $country_id . ',id,country_id,' .  $country_id,
            'name_ru' => 'required|string|regex:/^[а-яА-Я-]+$/u|max:100|unique:cities,name_ru,' .  $country_id . ',id,country_id,' .  $country_id,
            'country_id' => 'required|integer|exists:countries,id,deleted_at,NULL',
        ];
    }
}
