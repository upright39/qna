<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaCreateTest extends Model
{
    use HasFactory;
    protected $table = 'qna_create_test';
    protected $primaryKey = 'test_id';
    public $timestamps = false;
}
