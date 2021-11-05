<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaQuestionCategoryResource;
use App\Models\QnaQuestionCategory;
use Illuminate\Http\Request;

class QnaQuestionCategoryController extends Controller
{

    public function AllQnaQuestionCategory()
    {
        $user = QnaQuestionCategory::all();
        return QnaQuestionCategoryResource::collection($user);
    }



    public function AddQnaQuestionCategory(Request $request)
    {
        $user = new QnaQuestionCategory();

        $user->qc_by = $request->qcategory_by;
        $user->qc_name = $request->qcategory_name;
        $user->qc_desc = $request->qcategory_description;
        $user->qc_date = date("Y-m-d");
        $user->qc_time = strtotime(date("Y-m-d H:m:s"));

        $user->save();
        return response()->json(['message' => 'addeded successfully']);
    }




    public function DelQuestionCategory($id)
    {
        $user =  QnaQuestionCategory::find($id);
        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->qc_status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->qc_status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }


    public function UpdateQuesCat(Request $request, $id)
    {

        $user =  QnaQuestionCategory::find($id);

        if ($request->has('qc-by')) {

            $user->qc_by = $request->qcatigory_by;
        }
        if ($request->has('qcategory_name')) {

            $user->qc_name = $request->qcategory_name;
        }
        if ($request->has('qcategory_description')) {

            $user->qc_desc = $request->qcategory_description;
        }
        $user->qc_date = date("Y-m-d");
        $user->qc_time = strtotime(date("Y-m-d H:m:s"));
        $user->save();
        return response()->json(["message" => "updatted successfully"]);
    }

    public function SingleQuestionCategory($id)
    {
        $user =  QnaQuestionCategory::find($id);

        return  new QnaQuestionCategoryResource($user);
    }
}
