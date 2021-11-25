<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Resources\QnaQuestionResource;
use App\Models\QnaQuestions;
use App\Models\User_Upload;
use App\Models\QnaQuestionCategory;

use Illuminate\Http\Request;

class QnaQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllQuestions()
    {
        $user = QnaQuestions::all();
        return QnaQuestionResource::collection($user);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddTestQuestion(Request $request)
    {

        $cat_id = null;

        if ($request->has('qc_name')) {
            $catigory = new QnaQuestionCategory;
            $catigory->qc_name = $request->qc_name;
            $catigory->qc_by = $request->qc_by;
            $catigory->qc_date = date("Y-m-d");
            $catigory->qc_time = strtotime(date("Y-m-d H:m:s"));
            $catigory->save();

            $cat_id = $catigory->qc_id;
        } else {
            $cat_id = $request->question_cate_id;
        }

        $question = new QnaQuestions();

        $question->q_by = $request->question_by;
        $question->q_type = $request->question_type;
        $question->question = $request->question;
        $question->q_description = $request->question_description;
        $question->q_sub_id = $request->question_sub_id;
        $question->q_cate_id = $cat_id;
        $question->q_date = date("Y-m-d");
        $question->q_time = strtotime(date("Y-m-d H:m:s"));
        $question->save();

        $ques_id = $question->q_id;

        $image = new User_Upload;
        $request->validate([
            'uu_file_name' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);


        if ($request->has('uu_file_name')) {
            $image->uu_file_name = $request->file('uu_file_name')->store('question_image');
            $image->uu_user_id = $ques_id;
            $image->uu_user_to = $request->uu_user_to;
            $image->uu_path = $request->uu_path;
            $image->uu_type = $request->uu_type;
            $image->uu_date = date("Y-m-d");
        }
        $image->save();

        return response()->json(['massage' => 'submitted successfully..']);
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QnaQuestions  $qnaQuestions
     * @return \Illuminate\Http\Response
     */
    public function QnaQuestion($id)
    {
        $user =  QnaQuestions::find($id);
        return new QnaQuestionResource($user);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QnaQuestions  $qnaQuestions
     * @return \Illuminate\Http\Response
     */
    public function UpdateQuestion(Request $request, $id)
    {
        $user =  QnaQuestions::find($id);

        if ($request->has('q-by')) {

            $user->q_by = $request->question_by;
        }
        if ($request->has('question_subject_id')) {

            $user->q_subject_id = $request->question_subject_id;
        }
        if ($request->has('question_catigory_id')) {

            $user->q_cate_id = $request->question_catigory_id;
        }

        if ($request->has('question_type')) {

            $user->q_type = $request->question_type;
        }
        if ($request->has('question')) {

            $user->question = $request->question;
        }
        if ($request->has('question_description')) {

            $user->q_description = $request->question_description;
        }
        $user->q_date = date("Y-m-d");
        $user->q_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();

        return response()->json(['massage' => 'update successfully..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QnaQuestions  $qnaQuestions
     * @return \Illuminate\Http\Response
     */
    public function DeleteQuestion($id)
    {
        $user =  QnaQuestions::find($id);
        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->q_status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->q_status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }
}