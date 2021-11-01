<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class UserDetail extends Model
{
    use HasFactory;

     protected $table = 'users_details';
     public $timestamps = false;
     protected $primaryKey= 'u_details_id';
}