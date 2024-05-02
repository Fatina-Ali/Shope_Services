<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends MainRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'email'=>['required','email','unique:admins,email'],
            'password'=>['required','string','min:5'],
        ];
    }
}
