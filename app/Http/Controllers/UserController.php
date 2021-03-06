<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function allUsers()
  {
    $users = User::all();
    return UserResource::collection($users);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function addUser(Request $request)
  {
    $request->validate([

      'phone' => 'required|string',
      'name' =>  'required|string',
      'gender' => 'required|string',
      'date_of_birth' => 'string',
      'email' =>  'required|string|unique:users,email',
      'password' => 'required|confirmed|min:6',
      'username' => 'required|unique:users,pass',
      'country' => 'required|string',
      'city' => 'required|string',
      'wallet_id' => 'string',
      'user_type' => 'string',

    ]);

    $user = new User();

    $user->phone = $request->input('phone');

    $user->name =  $request->input('name');
    $user->gender = $request->input('gender');
    $user->dob = $request->input('date_of_birth');
    $user->email =  $request->input('email');
    $user->pass = $request->input('password');
    $user->email =  $request->input('email');
    $user->username = $request->input('username');
    $user->email =  $request->input('email');
    $user->country =  $request->input('country');
    $user->city = $request->input('city');
    $user->wallet_id =  $request->input('wallet_id');
    $user->user_type =  $request->input('user_type');
    $user->reg_date = date("Y-m-d");
    $user->reg_time = date("Y-m-d H:m:s");

    $user->save();

    $userDetail = new UserDetail();
    $userDetail->u_details_id_fk = $user->id;
    $userDetail->save();

    return response()->json(['message' => 'added succesfully', 'status' => 200]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
    return new UserResource($user);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function update(Request $request, $id)

  {

    $user = User::find($id);

    if ($request->has('name')) {

      $user->name = $request->input('name');
    }
    if ($request->has('phone')) {

      $user->phone = $request->input('phone');
    }
    if ($request->has('gender')) {

      $user->name = $request->input('gender');
    }
    if ($request->has('date_of_birth')) {

      $user->dob = $request->input('date_of_birth');
    }

    if ($request->has('email')) {

      $user->email = $request->input('email');
    }

    if ($request->has('password')) {

      $user->pass = $request->input('password');
    }
    if ($request->has('username')) {

      $user->username = $request->input('username');
    }
    if ($request->has('country')) {

      $user->country = $request->input('country');
    }
    if ($request->has('city')) {

      $user->city = $request->input('city');
    }
    if ($request->has('wallet_id')) {

      $user->country = $request->input('wallet_id');
    }

    if ($request->has('acount_type')) {

      $user->account_type = $request->input('account_type');
    }

    $user->save();

    return response()->json(['message' => 'updated succesfully', 'status' => 200]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function deleteUser($id)
  {
    $user = User::find($id);

    if ($user === Null) {

      return response()->json(['message' => 'the record does not exit', 'status' => 204]);
    }

    if ($user->status == 0) {
      return response()->json(['message' => 'the record does not exit', 'status' => 204]);
    }

    $user->status = 0;

    if ($user->save()) {
      return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
    } else {
      return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
    }
  }
}
