<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersDetailsController;
use App\Http\Controllers\QnaCreateTestController;
use App\Http\Controllers\QnaQuestionsController;
use App\Http\Controllers\QnaQuestionAnswerOptionsController;
use App\Http\Controllers\QnaQuestionCategoryController;


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

Route::get('user-details', [UsersDetailsController::class, 'AllUserDetails']);
Route::post('add-user-details', [UsersDetailsController::class, 'AddUserDetail']);
Route::delete('delete-user-detail/{key}', [UsersDetailsController::class, 'DeleteUserDetails']);
Route::put('update-user-details/{id}', [UsersDetailsController::class, 'UpdateUserDetails']);
Route::get('user-detail/{id}', [UsersDetailsController::class, 'UserDetail']);

//QNA CREATE TEST ROUTES//

Route::get('all-test-details', [QnaCreateTestController::class, 'QnaCreateTestAllUsers']);
Route::post('add-test-user', [QnaCreateTestController::class, 'CreateText']);
Route::delete('delete-test/{id}', [QnaCreateTestController::class, 'DeleteTest']);
Route::delete('update-test/{id}', [QnaCreateTestController::class, 'UpdateTest']);

//QNA QUESTIONS//

Route::get('all-question', [QnaQuestionsController::class, 'AllQuestions']);
Route::post('add-test-question', [QnaQuestionsController::class, 'AddTestQuestion']);
Route::get('qna-question/{id}', [QnaQuestionsController::class, 'QnaQuestion']);
Route::put('update-question/{id}', [QnaQuestionsController::class, 'UpdateQuestion']);
Route::delete('delete-question/{id}', [QnaQuestionsController::class, 'DeleteQuestion']);

//  QNA  QUESTION AND ANSWERS OPTIONS    //

Route::get('answer-options', [QnaQuestionAnswerOptionsController::class, 'AllQnaQuestionAnswerOptions']);
Route::post('add-answer-option', [QnaQuestionAnswerOptionsController::class, 'AddQuestionOptions']);
Route::put('update-answer-option/{id}', [QnaQuestionAnswerOptionsController::class, 'UpdateQuestion']);
Route::delete('delete-answer-option/{id}', [QnaQuestionAnswerOptionsController::class, 'DeleteQuestionOption']);
Route::get('answer-option/{id}', [QnaQuestionAnswerOptionsController::class, 'AnswerOption']);

//  QNA  QUESTION CATIEGORY  //
Route::get('all-question-category', [QnaQuestionCategoryController::class, 'AllQnaQuestionCategory']);
Route::post('add-question-category', [QnaQuestionCategoryController::class, 'AddQnaQuestionCategory']);
Route::delete('delete-question-category/{id}', [QnaQuestionCategoryController::class, 'DelQuestionCategory']);