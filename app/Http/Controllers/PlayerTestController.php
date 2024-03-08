<?php

namespace App\Http\Controllers;

use App\Enums\EstatusResult;
use App\Models\Question;
use App\Models\TestResultPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\EstatusAnswer;
use App\Enums\EstatusTest;
use App\Models\Answers;

use function PHPUnit\Framework\returnSelf;

class PlayerTestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTest)
    {
        $userId = Auth::user()->id;
        $infoTestResultPlayer = TestResultPlayer::where('test_id', $idTest)
        ->where('user_id', $userId)->first();
        
        if(!$infoTestResultPlayer){
            $newTest = TestResultPlayer ::create([
                'test_id' => $idTest,
                'status' => EstatusResult::PROCESO,
                'user_id' => $userId
            ]);
            $infoTestResultPlayer = $newTest;
        }
        return redirect()->route('player.test.show', ['idPlayerTest' => $infoTestResultPlayer->test_result_id]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;
        $testResultPlayer = TestResultPlayer::with('test_info')
        ->where('user_id', $userId)
        ->findOrFail($id);
        $preguntaNotAnswer = Question::where("test_id", $testResultPlayer->test_id)
        ->whereDoesntHave('answer_data', function($query) use($id){
            $query->where("test_result_id", $id);
        })
        ->first();
        if(!$preguntaNotAnswer){
            if($testResultPlayer->status === EstatusResult::PROCESO){
                $answerCorrect = Answers::where("test_result_id", $id)
                ->limit(100)
                ->get();
                $totalAnswers = $answerCorrect->count();
                $percentSuccess = 0.60; // 60%
                $amountSuccessTest = $totalAnswers * $percentSuccess;
                $answerCorrectTotal = $answerCorrect->where("status", EstatusAnswer::Correct)->count();
                
                $testResultPlayer->status = EstatusResult::COMPLETADO;
                $testResultPlayer->is_approved = ($answerCorrectTotal >= $amountSuccessTest) ? 1 : 0;
                $testResultPlayer->save();
            }
            return redirect()->route('evaluate.test.show', ['idTestResultPlayer' =>  $testResultPlayer->test_result_id]);
        }
        return view('test-player.index', compact('testResultPlayer', 'preguntaNotAnswer'));
    }
}
