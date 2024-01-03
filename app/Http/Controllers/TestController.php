<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('test.index');
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
            'nombre' => 'required|string|max:400',
            'descripcion' => 'required|string|max:600',
            // 'preguntas' => 'required|array',
            // 'preguntas.*.nombre' => "required|max:300|string",
            // 'preguntas.*.respuesta_a' => "required|string|max:600",
            // 'preguntas.*.respuesta_b' => "required|string|max:600",
            // 'preguntas.*.respuesta_c' => "required|string|max:600",
            // 'preguntas.*.respuesta_correcta' => "required|string|max:100",
        ]);
        dd($request);
    }
}
