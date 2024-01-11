<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $testList = Test::paginate(10);
        return view('test.index', compact('testList'));
    }

    /**
     * Show the form to create a new test.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('test.create');
    }

     /**
     * Store a new test post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:600',
            'descripcion' => 'required|string|max:800',
            'mensaje_exitoso' => 'required|string|max:800',
            'mensaje_fallo' => 'required|string|max:800',
        ]);
        $userId = Auth::id();
        $newTest = Test::create([
            "name" => $request->nombre,
            "description" => $request->descripcion,
            "message_success" => $request->mensaje_exitoso,
            "message_fail" => $request->mensaje_fallo,
            "user_id" => $userId
        ]);
        return redirect()->route('test.edit', ['id' => $newTest->test_id]);
    }

    public function edit($id)
    {
        $testEdit = Test::with("questions")->where("tests.test_id", $id)->firstOrFail();
        // dd(($testEdit->questions));
        return view('test.edit', compact('testEdit'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:600',
            'descripcion' => 'required|string|max:800',
            'mensaje_exitoso' => 'required|string|max:800',
            'mensaje_fallo' => 'required|string|max:800',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
    public function destroy($id)
    {
        $testDelete = Test::where("test_id", $id)->firstOrFail();
        $testDelete->delete();
        return redirect()->route('test')->with('success', 'Se elimino correctamente el test.');
    }
}
