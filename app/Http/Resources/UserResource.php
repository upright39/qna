<?php

namespace App\Http\Resources;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'name' => $this->name,
            'gender' => $this->gender,
            'date_of_birth' => $this->dob,
            'email' => $this->email,
            'password' => $this->pass,
            'username' => $this->username,
            'email' => $this->email,
            'country' => $this->country,
            'city' => $this->city,
            'wallet_id' => $this->wallet_id,
            'user_type' => $this->user_type,
            'account_type' => $this->account_type,
            'registration_date' => $this->reg_date,
            'registration_time' => $this->reg_time,


        ];
    }
}
