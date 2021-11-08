<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaTestQuestionResource;
use App\Models\QnaTestQuestion;
use Illuminate\Http\Request;

class QnaTestQuestionController extends Controller
{
    public function QnaTestQuestion()
    {
        $user = QnaTestQuestion::all();
        return QnaTestQuestionResource::collection($user);
    }


    public function AddQnaTestQuestion(Request $request)
    {
        $user = new QnaTestQuestion();
        $user->tq_question_id = $request->tq_question_id;
        $user->tq_test_id = $request->tq_test_id;
        $user->tq_user_id = $request->tq_user_id;
        $user->tq_chan_id = $request->tq_chan_id;
        $user->tq_date = date("Y-m-d");
        $user->tq_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['message' => "submitted successfully.."]);
    }



    public function UpdateTestQuestion(Request $request, $id)
    {
        $user =  QnaTestQuestion::find($id);

        if ($request->has('tq_qestion_id')) {
            $user->tq_qestion_id = $request->tq_qestion_id;
        }

        if ($request->has('tq_test_id')) {
            $user->tq_test_id = $request->tq_test_id;
        }

        if ($request->has('tq_user_id')) {
            $user->tq_user_id = $request->tq_user_id;
        }

        if ($request->has('tq_chan_id')) {
            $user->tq_chan_id = $request->tq_chan_id;
        }

        $user->tq_date = date("Y-m-d");
        $user->tq_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['message' => 'updated sucessfully']);
    }




    public function deleteTestQuestion(Request $request, $id)
    {

        $user =  QnaTestQuestion::find($id);

        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->tq_status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->tq_status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }

    public function SingleTestQuestion($id)

    {
        $user =  QnaTestQuestion::find($id);
        return new QnaTestQuestionResource($user);
    }
}