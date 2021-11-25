<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaQuestionCategory extends Model
{
    use HasFactory;
    protected $table = "qna_question_category";
    public $timestamps = false;
    protected $primaryKey = 'qc_id';


    // protected $fillable = [
    //     'qc_name',
    //     'qc_date',
    //     'qc_time',
    // ];
}