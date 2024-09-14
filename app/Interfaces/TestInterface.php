<?php

namespace App\Interfaces;

use App\Dto\TestDto;

interface TestInterface
{
    public function getTestPaginate(int $numberPage);
    public function filterTestByName(string $name);
    public function createTest(TestDto $testDto, string $userId);
    public function findTestById(string $testId);
    public function updateTest(TestDto $testDto, string $testId);
    public function deleteTest(string $testId);
    public function getTestResultByUserAuth(string $idUser);
}
