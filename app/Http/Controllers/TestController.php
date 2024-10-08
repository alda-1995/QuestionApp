<?php

namespace App\Http\Controllers;

use App\Dto\TestDto;
use App\Enums\EstatusTest;
use App\Models\Test;
use App\Services\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{

    protected $testService;
    public function __construct(TestService $testService)
    {   
        $this->testService = $testService;
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $testList = $this->testService->getListTestPaginate();
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
        $testDataCreate = new TestDto($request->nombre, $request->descripcion, $request->mensaje_exitoso, $request->mensaje_fallo);
        $newTest = $this->testService->createTest($testDataCreate);
        return redirect()->route('test.edit', ['id' => $newTest->test_id]);
    }

    public function edit($id)
    {
        $testEdit = $this->testService->getTestById($id);
        $listStatus = [
            ['value' => EstatusTest::PROCESO, 'label' => 'En proceso'],
            ['value' => EstatusTest::FINALIZAR, 'label' => 'Finalizar']
        ];
        return view('test.edit', compact('testEdit', 'listStatus'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:600',
            'descripcion' => 'required|string|max:800',
            'mensaje_exitoso' => 'required|string|max:800',
            'mensaje_fallo' => 'required|string|max:800',
            'estatus' => 'required|string|max:500',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $testUpdate = Test::findOrFail($id);
        $testUpdate->name = $request->nombre;
        $testUpdate->description = $request->descripcion;
        $testUpdate->message_success = $request->mensaje_exitoso;
        $testUpdate->message_fail = $request->mensaje_fallo;
        $testUpdate->status = $request->estatus;
        $testUpdate->save();
        return redirect()->back()->with("success", "Se actualizo correctamente");
    }

    public function search(Request $request){
        $validator = Validator::make($request->all(), [
            'filter' => 'nullable|string|max:600',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("error", "El valor no es correcto.");
        }
        $testList = Test::where("name", "LIKE", "%".$request->filter."%")->limit(100)->paginate(10);
        return view('test.index', compact('testList'));
    }

    public function destroy($id)
    {
        $testDelete = Test::where("test_id", $id)->firstOrFail();
        $existRelacionesTest = $testDelete->secureDelete("test_result");
        if($existRelacionesTest){
            return redirect()->route('test')->with('error', 'El test ya esta relacionado a los jugadores.');
        }
        $testDelete->delete();
        return redirect()->route('test')->with('success', 'Se elimino correctamente el test.');
    }
}
