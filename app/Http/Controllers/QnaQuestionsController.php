<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaQuestionResource;
use App\Models\QnaQuestions;
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
        $user = new QnaQuestions();


        $user->q_by = $request->question_by;
        $user->q_sub_id = $request->question_subject_id;
        $user->q_cate_id = $request->question_catigory_id;
        $user->q_type = $request->question_type;
        $user->question = $request->question;
        $user->q_description = $request->question_description;
        $user->q_status = $request->question_status;
        $user->q_date = date("Y-m-d");
        $user->q_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
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
