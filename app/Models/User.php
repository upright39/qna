<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'phone',
        'name',
        'email',
        'password',
        'dob',
        'email',
        'pass',
        'username',
        'country',
        'city',
        'wallet_id',
        'user_type',
        //'status',
        'account_type',
        // 'reg_date',
        // 'reg_time'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps=false;
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //protected $dates = ['registration_date'];

//     protected $attributes=[
//         'status'=>'1',
//         'inactive'=>'0',
//          'admin'=>'1',
//          'employee'=>'2',
//         'user'=>'3',
//          'advertiser'=>'4',
//          'content creator'=>'5'
        





}