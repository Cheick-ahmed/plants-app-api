<?php

namespace App\Http\Requests\Auth;

use App\Rules\CurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|max:255|email|unique:users,email,'. auth()->id(),
            'password' => 'nullable|min:6|confirmed',
            'password_current' => [ new CurrentPasswordRule()],
        ];
    }
}
