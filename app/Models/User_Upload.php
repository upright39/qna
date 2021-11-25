<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_upload extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "uu_path"
    ];
}