<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaQuestionResource extends JsonResource
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
            'question_id' => $this->q_id,
            'question_by' => $this->q_by,
            'question_subject_id' => $this->q_sub_id,
            'question_catigory_id' => $this->q_cate_id,
            'question_type' => $this->q_type,
            'question' => $this->question,
            'question_description' => $this->q_description,
            'question_date' => $this->q_date,
            'question_time' => $this->q_time,
            'question_status' => $this->q_status,

        ];
    }
}