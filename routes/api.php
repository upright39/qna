<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersDetailsController;
use App\Http\Controllers\QnaCreateTestController;
use App\Http\Controllers\QnaQuestionsController;
use App\Http\Controllers\QnaQuestionAnswerOptionsController;
use App\Http\Controllers\QnaQuestionCategoryController;
use App\Http\Controllers\QnaSubjectController;
use App\Http\Controllers\QnaTestQuestionController;
use App\Http\Controllers\QnaUserTestAnswerController;




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
Route::post('update-test/{id}', [QnaCreateTestController::class, 'UpdateTest']);

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
Route::put('update-question-category/{id}', [QnaQuestionCategoryController::class, 'UpdateQuesCat']);
Route::get('single-question-category/{id}', [QnaQuestionCategoryController::class, 'SingleQuestionCategory']);

//QNA SUBJECTS//

Route::get('all-qna-subjects', [QnaSubjectController::class, 'AllQnaSubject']);
Route::post('add-qna-subjects', [QnaSubjectController::class, 'AddSubJect']);
Route::put('update-qna-subjects/{id}', [QnaSubjectController::class, 'UpdateSubJect']);
Route::delete('delete-qna-subjects/{id}', [QnaSubjectController::class, 'DeleteQnaSubject']);
Route::get('single-qna-subject/{id}', [QnaSubjectController::class, 'SingleSubject']);


// Qna Test Question//

Route::get('test-question', [QnaTestQuestionController::class, 'QnaTestQuestion']);
Route::post('add-test-questions', [QnaTestQuestionController::class, 'AddQnaTestQuestion']);
Route::put('update-test-questions/{id}', [QnaTestQuestionController::class, 'UpdateTestQuestion']);
Route::delete('delete-test-questions/{id}', [QnaTestQuestionController::class, 'DeleteTestQuestion']);
Route::get('single-test-questions/{id}', [QnaTestQuestionController::class, 'SingleTestQuestion']);

// Qna User Test Question//

Route::get('user-test-answers', [QnaUserTestAnswerController::class, 'AllUsersTestAnswers']);