<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestResultPlayer;
use Illuminate\Http\Request;

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
        ->with("test_info")
        ->firstOrFail();
        // $testInfo = Test::where("test_id", $idTest)->with("test_result")
        // ->firstOrFail();
        // dd($testInfo);
        return view("evaluate.index", compact('testResultInfoPlayer'));
    }
}
