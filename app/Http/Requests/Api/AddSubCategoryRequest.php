<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddSubCategoryRequest extends MainRequest
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
            'category_id'=>['required','integer'],
            'name'=>['required', 'string' , 'unique:sub__categories,name']
        ];
    }
}
