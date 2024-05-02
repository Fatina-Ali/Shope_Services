<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends MainRequest
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
            'status'=>['required' , 'string' , 'in:Pending,Accepted,Denied']
        ];
    }
}
