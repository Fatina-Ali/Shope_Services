<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'type'=>$this->type,
            'personalPhoto'=>$this->personal_photo,
            'telephone'=>$this->telephone,
            'nameOfTheBank'=>$this->name_of_the_bank,
            'accountNumber'=>$this->account_number,
            'residencePhoto'=>$this->residence_photo,
            'location'=>$this->location,
            'status'=>$this->status,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
