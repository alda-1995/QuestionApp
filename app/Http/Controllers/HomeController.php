<?php

namespace App\Http\Controllers;

use App\Enums\EstatusTest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $testList = Test::with(['test_result' => function($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where("status", EstatusTest::PROCESO)
        ->get();
        return view('home', compact('testList'));
    }
}
