<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaQuestionAnswerOptions extends Model
{
    use HasFactory;
    protected $table = 'qna_questions_answers_options';
    public $timestamps = false;
    protected $primaryKey = 'qao_id';
}