<?php

namespace App\Http\Requests\Auth;

use App\Rules\CurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordFormRequest extends FormRequest
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
            'password_current' => ['required', new CurrentPasswordRule()],
            'password' => 'required|min:6|confirmed'
        ];
    }
}
