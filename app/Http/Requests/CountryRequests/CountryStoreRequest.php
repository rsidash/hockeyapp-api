<?php

namespace App\Http\Requests\CountryRequests;

use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
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
            'country_code' => 'required|string|regex:/^[A-Z]+$/u|max:2|unique:countries,country_code',
            'name_en' => 'required|string|regex:/^[a-zA-Z-]+$/u|max:100|unique:countries,name_en',
            'name_ru' => 'required|string|regex:/^[а-яА-Я-]+$/u|max:100|unique:countries,name_ru',
            'phone_code' => 'required|string|starts_with:+|max:10',
        ];
    }
}
