<?php

namespace App\Http\Controllers;

use App\Http\Resources\QnaUserTestAnswerResource;
use App\Models\QnaUserTestAnswer;
use Illuminate\Http\Request;

class QnaUserTestAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllUsersTestAnswers()
    {
        $user = QnaUserTestAnswer::all();
        return QnaUserTestAnswerResource::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QnaUserTestAnswer  $qnaUserTestAnswer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QnaUserTestAnswer  $qnaUserTestAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QnaUserTestAnswer  $qnaUserTestAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QnaUserTestAnswer  $qnaUserTestAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}