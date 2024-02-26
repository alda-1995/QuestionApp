<?php

use App\Http\Controllers\AnswerTestController;
use App\Http\Controllers\EvaluateTestController;
use App\Http\Controllers\PlayerTestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // apis results
    // Route::post('answer-test/{id}', [AnswerTestController::class, 'store'])->name("answer.test.create");
    // Route::get('answer-test/{idAsnwerTest}', [AnswerTestController::class, 'edit'])->name("answer.test.edit");
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    // apis test admin
    Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
    Route::get('/test/crear', [TestController::class, 'create'])->name('test.create');
    Route::post('/test', [TestController::class, 'store']);
    Route::get('/test/{id}/edit', [TestController::class, 'edit'])->name('test.edit');
    Route::put('/test/{id}', [TestController::class, 'update'])->name('test.update');
    Route::delete('/test/{id}', [TestController::class, 'destroy'])->name("test.destroy");
    // apis question admin
    Route::post('/questions-test', [QuestionController::class, 'store'])->name('questions.save');
    Route::get('/question/{id}/edit', [QuestionController::class, 'edit'])->name("question.edit");
    Route::put('/question-update/{id}/{test_id}', [QuestionController::class, 'update'])->name("question-update");
    Route::delete('/question/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');
});

Route::group(['middleware' => ['role:player']], function () {
    Route::post('player-test/{id}', [PlayerTestController::class, 'store'])->name("player.test.create");
    Route::get('player-test/{idPlayerTest}', [PlayerTestController::class, 'show'])->name("player.test.show");
    Route::post('/answers-test/{idQuestion}/{idTestResult}', [AnswerTestController::class, 'store'])->name('answer.test.save');
    //vista que muestra el resultado de un test
    Route::get('evaluate-test/{idTestResultPlayer}', [EvaluateTestController::class, 'show'])->name("evaluate.test.show");
});