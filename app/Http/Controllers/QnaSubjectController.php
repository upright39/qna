<?php

namespace App\Http\Controllers;

use App\Models\QnaSubject;
use Illuminate\Http\Request;
use App\Http\Resources\QnaSubjectResource;


class QnaSubjectController extends Controller
{
    public function AllQnaSubject()
    {

        $user = QnaSubject::all();
        return QnaSubjectResource::collection($user);
    }


    public function AddSubJect(Request $request)
    {
        $user = new QnaSubject();
        $user->sub_by = $request->subject_by;
        $user->sub_desc = $request->subject_desc;
        $user->sub_name = $request->subject_name;
        $user->sub_chan_id = $request->subject_chan_id;
        $user->sub_date = date("Y-m-d");
        $user->sub_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['message' => 'subject added']);
    }

    public function UpdateSubject(Request $request, $id)
    {
        $user = QnaSubject::find($id);

        if ($request->has('subject_by')) {
            $user->sub_by = $request->subject_by;
        }

        if ($request->has('sub_desc')) {
            $user->sub_desc = $request->subject_desc;
        }

        if ($request->has('subject_name')) {
            $user->sub_name = $request->subject_name;
        }

        if ($request->has('sub_chan_id')) {
            $user->sub_chan_id = $request->sub_chan_id;
        }

        $user->sub_date = date("Y-m-d");
        $user->sub_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['message' => 'updated sucessfully']);
    }





    public function DeleteQnaSubject($id)
    {
        $user = QnaSubject::find($id);

        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->sub_status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->sub_status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }



    public function SingleSubject($id)
    {
        $user = QnaSubject::find($id);

        return new QnaSubjectResource($user);
    }
}