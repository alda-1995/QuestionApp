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
        return redirect()->route('player.test.show', ['idPlayerTest' => $idTestResult]);
    }
}
