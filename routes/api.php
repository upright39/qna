<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersDetailsController;
use App\Http\Controllers\QnaCreateTestController;
use App\Http\Controllers\QnaQuestionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'allUsers']);
Route::post('adduser', [UserController::class, 'addUser']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::put('update/{id}', [UserController::class, 'update']);
Route::delete('delete/{id}', [UserController::class, 'deleteUser']);

//user details routes//

Route::get('userdetails', [UsersDetailsController::class, 'AllUserDetails']);
Route::post('adduserdetails', [UsersDetailsController::class, 'AddUserDetail']);
Route::delete('deleteuserdetail/{key}', [UsersDetailsController::class, 'DeleteUserDetails']);
Route::put('updateuserdetails/{id}', [UsersDetailsController::class, 'UpdateUserDetails']);
Route::get('userdetail/{id}', [UsersDetailsController::class, 'UserDetail']);

//QNA CREATE TEST ROUTES//

Route::get('alltestdetails', [QnaCreateTestController::class, 'QnaCreateTestAllUsers']);
Route::post('addtestuser', [QnaCreateTestController::class, 'CreateText']);
Route::post('addtestuser', [QnaCreateTestController::class, 'CreateText']);
Route::delete('deletetest/{id}', [QnaCreateTestController::class, 'DeleteTest']);
Route::delete('updatetest/{id}', [QnaCreateTestController::class, 'UpdateTest']);

//QNA QUESTIONS//

Route::get('allquestion', [QnaQuestionsController::class, 'AllQuestions']);