<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

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

Route::get('', [HomeController::class, 'home'])->name('home');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


Route::group(['prefix' => 'surveys'], function () {
    Route::get('', [SurveyController::class, 'index'])->name('survey.index');
    Route::get('create', [SurveyController::class, 'create'])->name('survey.create');
    Route::get('delete', [SurveyController::class, 'delete'])->name('survey.delete');
    Route::post('store', [SurveyController::class, 'store'])->name('survey.store');

    Route::get('take', [SubmitController::class, 'take'])->name('survey.take');
    Route::get('next-question', [SubmitController::class, 'nextQuestion'])->name('survey.next-question');
    Route::post('submit', [SubmitController::class, 'submit'])->name('survey.submit');
    Route::get('view-submissions', [SubmitController::class, 'viewSubmissions'])->name('survey.view-submissions');
});
