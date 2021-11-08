<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnaTestQuestion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "tq_id";
}