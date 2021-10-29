<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
            $table->string('gender');
            $table->string('dob');
            $table->string('email');
            $table->string('pass');
            $table->string('username');
            $table->string('country');
            $table->string('city');
            $table->string('wallet_id');
            $table->string('user_type');
            $table->string('status');
            $table->string('account_type');
            $table->string('reg_date');
            $table->string('reg_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}