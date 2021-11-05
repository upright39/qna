<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaQuestionAnswerOptionsResource;
use App\Models\QnaQuestionAnswerOptions;
use Illuminate\Http\Request;

class QnaQuestionAnswerOptionsController extends Controller
{



    public function  AllQnaQuestionAnswerOptions()
    {
        $user = QnaQuestionAnswerOptions::all();

        return QnaQuestionAnswerOptionsResource::collection($user);
    }


    public function AddQuestionOptions(Request $request)
    {
        $user = new QnaQuestionAnswerOptions();

        $user->qao_chan_id = $request->qao_chan_id;
        $user->qao_user_id = $request->qao_user_id;
        $user->qao_question_id = $request->qao_question_id;
        $user->qao_answer_type = $request->qao_answer_type;
        $user->qao_answer = $request->qao_answer;
        $user->qao_answer_image = $request->qao_answer_image;
        $user->qao_answer_comment = $request->qao_answer_comment;
        $user->qao_answer_status = $request->qao_answer_status;
        $user->qao_date = date("Y-m-d");
        $user->qao_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['massage' => 'added successfully']);
    }



    public function UpdateQuestion(Request $request, $id)
    {
        $user =  QnaQuestionAnswerOptions::find($id);

        if ($request->has('qao_chan_id')) {
            $user->qao_chan_id = $request->qao_chan_id;
        }

        if ($request->has('qao_user_id')) {
            $user->qao_user_id = $request->qao_user_id;
        }

        if ($request->has('qao_answer_type')) {
            $user->qao_answer_type = $request->qao_answer_type;
        }
        if ($request->has('qao_answer')) {
            $user->qao_answer = $request->qao_answer;
        }

        if ($request->has('qao_answer_image')) {
            $user->qao_answer_image = $request->qao_answer_image;
        }

        if ($request->has('qao_answer_comment')) {
            $user->qao_answer_comment = $request->qao_answer_comment;
        }

        if ($request->has('qao_answer_status')) {
            $user->qao_answer_status = $request->qao_answer_status;
        }

        $user->save();
        return response()->json(['massage' => 'updatted successfully']);
    }




    public function DeleteQuestionOption($id)
    {
        $user =  QnaQuestionAnswerOptions::find($id);
        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->enabled == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->enabled = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }


    public function AnswerOption($id)
    {
        $user =  QnaQuestionAnswerOptions::find($id);
        return new QnaQuestionAnswerOptionsResource($user);
    }
}