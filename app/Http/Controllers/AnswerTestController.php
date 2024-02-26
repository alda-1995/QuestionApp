<?php

namespace App\Http\Controllers;

use App\Enums\EstatusAnswer;
use App\Enums\EstatusResult;
use App\Models\Answers;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    
    public function store(Request $request, $idQuestion, $idTestResult)
    {
        $messageValidate = [
            'answer_question.required' => "Elige una opción.",
            'answer_question.string' => "El valor es incorrecto",
            'answer_question.max' => "El campo es incorrecto."
        ];
        $request->validate([
            'answer_question' => 'required|string|max:1',
        ], $messageValidate);

        $questionCorrect = Question::findOrFail($idQuestion)->pluck('answer_correct')->first();
        $statusAnswer = ($request->answer_question === $questionCorrect ) ? EstatusAnswer::Correct : EstatusAnswer::Incorrect;
        Answers::create([
           'response_question' => $request->answer_question,
           'status' => $statusAnswer,
           'test_result_id' => $idTestResult,
           'question_id' => $idQuestion,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
