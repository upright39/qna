<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaQuestions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'q_id';
}