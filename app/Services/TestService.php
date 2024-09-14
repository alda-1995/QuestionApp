<?php

namespace App\Services;

use App\Dto\TestDto;
use App\Repository\TestRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class TestService
{
    protected $testRepository;
    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function getListTestPaginate(){
        try {
            $listTestPaginate = $this->testRepository->getTestPaginate(10);
            return $listTestPaginate;
        } catch (Exception $ex) {
            throw new Exception("Se genero un error al consultar los test");
        }
    }

    public function getListTestByUserAuth(string $userId){
        try {
            $listTest = $this->testRepository->getTestResultByUserAuth($userId);
            return $listTest;
        } catch (Exception $ex) {
            throw new Exception("Se genero un error al consultar los test del usuario");
        }
    }

    public function createTest(TestDto $testDto){
        try {
            $userId = Auth::id();
            $newTest = $this->testRepository->createTest($testDto, $userId);
            return $newTest;
        } catch (Exception $ex) {
            throw new Exception("Error al crear el test");
        }
    }

    public function getTestById(string $testId){
        try {
            $testDetalle = $this->testRepository->findTestById($testId);
            return $testDetalle;
        } catch (Exception $ex) {
            throw new Exception("Error al consultar el detalle del test");
        }
    }
}
