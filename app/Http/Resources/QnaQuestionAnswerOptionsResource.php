<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaQuestionAnswerOptionsResource extends JsonResource
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

            "qao_id" => $this->qao_id,
            "qao_chan_id" => $this->qao_chan_id,
            "qao_user_id" => $this->qao_user_id,
            "qao_question_id" => $this->qao_question,
            "qao_answer_type" => $this->qao_answer_type,
            "qao_answer" => $this->qao_answer,
            "qao_answer_image" => $this->qao_answer,
            "qao_answer_comment" => $this->qao_answer_comment,
            "qao_answer_status" => $this->qao_answer_status,
            "qao_date" => $this->qao_date,
            "qao_time" => $this->qao_time
        ];
    }
}