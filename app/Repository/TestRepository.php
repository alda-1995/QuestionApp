<?php

namespace App\Repository;

use App\Dto\TestDto;
use App\Enums\EstatusTest;
use App\Interfaces\TestInterface;
use App\Models\Test;

class TestRepository implements TestInterface
{

    public function getTestPaginate(int $numberPage)
    {
        $testList = Test::paginate($numberPage);
        return $testList;
    }

    public function createTest(TestDto $testDto, string $userId)
    {
        $newTest = Test::create([
            "name" => $testDto->nombre,
            "description" => $testDto->descripcion,
            "message_success" => $testDto->mensajeExito,
            "message_fail" => $testDto->mensajeFallo,
            "user_id" => $userId
        ]);
        return $newTest->test_id;
    }

    public function findTestById(string $testId)
    {
        $testFind = Test::with("questions")->where("tests.test_id", $testId)->firstOrFail();
        return $testFind;
    }

    public function updateTest(TestDto $testDto, string $testId)
    {
        $testUpdate = Test::find($testId);
        $testUpdate->name = $testDto->nombre;
        $testUpdate->description = $testDto->descripcion;
        $testUpdate->message_success = $testDto->mensajeExito;
        $testUpdate->message_fail = $testDto->mensajeFallo;
        $testUpdate->status = $testDto->estatus;
        $testUpdate->save();
    }

    public function deleteTest(string $testId)
    {
        $testDelete = Test::find($testId);
        $testDelete->delete();
    }

    public function getTestResultByUserAuth(string $userId){
        $testList = Test::with(['test_result' => function($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->where("status", EstatusTest::PROCESO)
        ->get();
        return $testList;
    }

    public function filterTestByName(string $name)
    {
        $testList = Test::where("name", "LIKE", "%".$name."%")->limit(100)->paginate(10);
        return $testList;
    }
}
