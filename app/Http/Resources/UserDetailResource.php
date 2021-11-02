<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
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
            'user_details_id' => $this->u_details_id,
            'user_details_employee_adress' => $this->u_details_emplo_add,
            'user_details_contact_address' => $this->u_details_contact_add,
            'user_details_nationality' => $this->u_details_nationality,
            'user_details_state' => $this->u_details_state,
            'user_details_name' => $this->u_details_name_emplo
        ];
    }
}
