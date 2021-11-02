<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QnaCreateTestResource extends JsonResource
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
            'test_id' => $this->test_id,
            'test_by_id' => $this->test_by_id,
            'test_code_id' => $this->test_code_id,
            'test_title' => $this->test_title,
            'test_desc' => $this->test_dese,
            'test_fee' => $this->test_fee,
            'test_main_date' => $this->test_main_date,
            'test_end_date' => $this->test_end_date,
            'test_main_time' => $this->test_main_time,
            'test_end_time' => $this->test_end_time,
            'test_duration' => $this->test_duration,
            'test_duration_timeframe' => $this->test_duration_timeframe,
            'test_reward' => $this->test_reward,
            'test_view_type' => $this->test_view_type,
            'test_time_per_question' => $this->test_time_per_question,

        ];
    }
}