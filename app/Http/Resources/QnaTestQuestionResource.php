<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaTestQuestionResource extends JsonResource
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
            "tq_id" => $this->tq_id,
            "tq_question_id" => $this->tq_question_id,
            "tq_test_id" => $this->tq_test_id,
            "tq_user_id" => $this->tq_user_id,
            "tq_chan_id" => $this->tq_chan_id,
            "tq_date" => $this->tq_date,
            "tq_time" => $this->tq_time,
        ];
    }
}