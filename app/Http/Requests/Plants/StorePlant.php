<?php

namespace App\Http\Requests\Plants;

use Illuminate\Foundation\Http\FormRequest;

class StorePlant extends FormRequest
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
            'n_vernaculaire' => 'required',
            'ng_latin' => 'required',
            'ne_latin' => 'required',
            'family' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'n_vernaculaire.required' => 'Nom vernacualaire obligatoire.',
            'ng_latin.required' => 'Nom genre latin obligatoire.',
            'ne_latin.required' => 'Nom espèce latin obligatoire.',
            'family.required' => 'Famille obligatoire.',
        ];
    }
}
