<?php

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
Route::group(['middleware' => ['role:player']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    // apis test admin
    Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
    Route::get('/test/crear', [TestController::class, 'create'])->name('test.create');
    Route::post('/test', [TestController::class, 'store']);
    Route::get('/test/{id}/edit', [TestController::class, 'edit'])->name('test.edit');
    Route::put('/test', [TestController::class, 'update']);
    Route::delete('/test/{id}', [TestController::class, 'destroy'])->name("test.destroy");
    // apis question admin
    Route::post('/questions-test', [QuestionController::class, 'store'])->name('questions.save');
    Route::get('/question/{id}/edit', [QuestionController::class, 'edit'])->name("question.edit");
    Route::put('/question-update/{id}/{test_id}', [QuestionController::class, 'update'])->name("question-update");
    Route::delete('/question/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');
});