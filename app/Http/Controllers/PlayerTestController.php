<?php

namespace App\Http\Controllers;

use App\Enums\EstatusResult;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $newTest = Result::create([
            'test_id' => $idTest,
            'status' => EstatusResult::PROCESO,
            'user_id' => $userId
        ]);
        return redirect()-route('player.test.show', ['id' => $newTest->id]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultData = Result::findOrFail($id);
        return view('test-player.index', compact('resultData'));
    }
}
