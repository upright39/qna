<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaSubjectResource extends JsonResource
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

            'sub_id' => $this->sub_id,
            'subjet_by' => $this->sub_by,
            'subject_desc' => $this->sub_desc,
            'subject_name' => $this->sub_name,
            'subject_chan_id' => $this->sub_chan_id,

        ];
    }
}