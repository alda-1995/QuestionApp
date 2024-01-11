<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_id' => "required|integer|exists:tests,test_id",
            'nombre_pregunta' => "required|max:300|string",
            'respuesta_a' => "required|max:300|string",
            'respuesta_b' => "required|string|max:600",
            'respuesta_c' => "required|string|max:600",
            'respuesta_correcta' => "required|string|max:100",
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with("errorQuestions", true);
        }
        Question::create([
            "test_id" => $request->test_id,
            "name" => $request->nombre_pregunta,
            "question_a" => $request->respuesta_a,
            "question_b" => $request->respuesta_b,
            "question_c" => $request->respuesta_c,
            "answer_correct" => $request->respuesta_correcta,
        ]);
        return redirect()->route("test.edit", ['id' => $request->test_id])->with("success", "Se agrego la pregunta correctamente");
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
        $questionEdit = Question::findOrFail($id);
        // dd($questionEdit);
        return view("question.edit", compact('questionEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $test_id)
    {
        $validator = Validator::make($request->all(), [
            'nombre_pregunta' => "required|max:300|string",
            'respuesta_a' => "required|max:300|string",
            'respuesta_b' => "required|string|max:600",
            'respuesta_c' => "required|string|max:600",
            'respuesta_correcta' => "required|string|max:100",
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $questionUpdate = Question::findOrFail($id);
        $questionUpdate->name = $request->nombre_pregunta;
        $questionUpdate->question_a = $request->respuesta_a;
        $questionUpdate->question_b = $request->respuesta_b;
        $questionUpdate->question_c = $request->respuesta_c;
        $questionUpdate->answer_correct = $request->respuesta_correcta;
        $questionUpdate->save();
        return redirect()->route('test.edit', [ 'id' => $test_id])->with("success", "Se actulizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionDelete = Question::findOrFail($id);
        $questionDelete->delete();
        return redirect()->back()->with("success", "Se elimino la pregunta correctamente");;
    }
}
