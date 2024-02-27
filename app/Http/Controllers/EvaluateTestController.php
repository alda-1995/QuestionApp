<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestResultPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluateTestController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idTestResultPlayer)
    {
        $testResultInfoPlayer = TestResultPlayer::where('test_result_id', $idTestResultPlayer)
        ->select("test_result_players.test_result_id", "test_result_players.test_id",
        "test_result_players.status", "test_result_players.is_approved")
        ->addSelect([
            DB::raw('(SELECT COUNT(*) FROM answers WHERE answers.test_result_id = test_result_players.test_result_id AND answers.status = "correcto") 
    as num_answers_correct'),
        ])
        ->addSelect([
            DB::raw('(SELECT COUNT(*) FROM answers WHERE answers.test_result_id = test_result_players.test_result_id AND answers.status = "incorrect") 
    as num_answers_incorrect'),
        ])
        ->with("test_info")
        ->where("test_result_players.test_result_id", $idTestResultPlayer)
            ->firstOrFail();

        // dd($testResultInfoPlayer);
        return view("evaluate.index", compact('testResultInfoPlayer'));
    }
}
