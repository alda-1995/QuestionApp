<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userName = Auth::user()->name;
        $numRegisterUserPlayer = User::whereHas('roles', function ($query) {
            $query->where('name', 'player');
        })->count();
        $testList = Test::limit(100)->get();
        return view('dashboard', compact('numRegisterUserPlayer', 'userName', 'testList'));
    }
}
