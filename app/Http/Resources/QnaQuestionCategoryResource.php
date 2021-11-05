<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaQuestionCategoryResource extends JsonResource
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
            'qc_id' => $this->qc_id,
            'qcategory_by' => $this->qc_by,
            'qcategory_name' => $this->qc_name,
            'qcategory_description' => $this->qc_desc,
            'qcdate' => $this->qc_date,
            'qctime' => $this->qc_time,
        ];
    }
}