<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaQuestions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'q_id';
    // protected $fillable = [
    //     'q_by',
    //     'q_sub_id',
    //     'q_cate_id',
    //     'q_type',
    //     'question',
    //     'q_description',
    //     'q_date',
    //     'q_time',

    // ];
}