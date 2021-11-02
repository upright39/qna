<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaCreateTestResource;
use App\Models\QnaCreateTest;
use Illuminate\Http\Request;

class QnaCreateTestController extends Controller
{
    //


    public function QnaCreateTestAllUsers()
    {
        $user = QnaCreateTest::all();
        return QnaCreateTestResource::collection($user);
    }



    public function CreateText(Request $request)
    {


        // $request->validate([
        //     'test_main_date' => 'date_format:d/m/Y',
        //     'test_end_date' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today',
        //     'test_main_time' => 'date_format:H:i',
        //     'test_end_time' => 'date_format:H:i|after:time_start',
        // ]);

        $user = new QnaCreateTest();

        $user->test_by_id = $request->test_by_id;
        $user->test_code_id = $request->test_code_id;
        $user->test_title = $request->test_title;
        $user->test_desc = $request->test_dese;
        $user->test_fee = $request->test_fee;
        $user->test_main_date = $request->test_main_date;
        $user->test_end_date = $request->test_end_date;
        $user->test_main_time = $request->test_main_time;
        $user->test_end_time = $request->test_end_time;
        $user->test_duration = $request->test_duration;
        $user->test_duration_timeframe = $request->test_duration_timeframe;
        $user->test_reward = $request->test_reward;
        $user->test_view_type = $request->test_view_type;
        $user->test_time_per_question = $request->test_time_per_question;
        $user->test_date = date("Y-m-d");
        $user->test_time = date("Y-m-d H-m-s");


        $user->save();

        return response()->json(['massage' => 'submitted successfully']);
    }

    public  function DeleteTest($id)
    {
        $user = QnaCreateTest::find($id);

        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->test_status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->test_status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }



    public function UpdateTest(Request $request, $id)
    {

        $user = QnaCreateTest::find($id);

        if ($request->has('test_by_id')) {

            $user->name = $request->input('test_by_id');
        }

        if ($request->has('test_code_id')) {

            $user->name = $request->input('test_code_id');
        }

        if ($request->has('test_title')) {

            $user->name = $request->input('test_title');
        }
        if ($request->has('test_desc')) {

            $user->name = $request->input('test_desc');
        }

        if ($request->has('test_fee')) {

            $user->name = $request->input('test_fee');
        }
        if ($request->has('test_main_date')) {

            $user->name = $request->input('test_main_date');
        }
        if ($request->has('test_end_date')) {

            $user->name = $request->input('test_end_date');
        }
        if ($request->has('test_main_time')) {

            $user->name = $request->input('test_main_time');
        }
        if ($request->has('test_end_time')) {

            $user->name = $request->input('test_end_time');
        }
        if ($request->has('test_duration')) {

            $user->name = $request->input('test_duration');
        }
        if ($request->has('test_duration_timeframe')) {

            $user->name = $request->input('test_duration_timeframe');
        }
        if ($request->has('test_reward')) {

            $user->name = $request->input('test_reward');
        }
        if ($request->has('test_view_type')) {
            $user->name = $request->input('test_view_type');
        }
        if ($request->has('test_time_per_question')) {

            $user->name = $request->input('test_time_per_question');
        }

        return response()->json(['message' => 'updated succesfully', 'status' => 200]);
    }
}