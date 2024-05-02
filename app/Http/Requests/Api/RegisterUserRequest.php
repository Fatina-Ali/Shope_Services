<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends MainRequest
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
            'name'=>['required' , 'string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required' , 'string' ,'min:5'],
            'type'=>['required' , 'string' ,'in:normal user,maintenance technician'],
            'personal_photo'=>['required','file','mimes:png,jpg'],
            'telephone'=>['required','string'],
            'name_of_the_bank'=>['required','string'],
            'account_number'=>['required','string'],
            'residence_photo'=>['required','file','mimes:png,jpg'],
            'location'=>['required','string'],
            'categories_id'=>['required','sometimes','array'],
            'sub_categories_id'=>['required','sometimes','array'],
        ];
    }
}
