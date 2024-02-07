<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('businessCard');
});

Route::get('/dashboard', function () {
    return redirect('topics');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // тут мои маршруты, доступные только авторизированному пользователю
    Route::get('/personal_account', [IndexController::class, 'personal_account'])->name('personal_account');
    Route::get('/statistics', [IndexController::class, 'statistics'])->name('statistics');

    //изменить данные пользователя
    Route::get('/change_name_form', [UserDataController::class, 'change_name_form'])->name('change_name_form');
    Route::post('/change_name', [UserDataController::class, 'change_name'])->name('change_name');
});

//изначальные мои маршруты
Route::get('/businessCard', [IndexController::class, 'GetBusinessCard'])->name('businessCard');
Route::get('/topics', [IndexController::class, 'GetTopics'])->name('topics');
Route::get('topic/{id}', [IndexController::class, 'GetTopic'])->whereNumber('id')->name('getTopic');
Route::get('tasks/{sub_topic_id}', [IndexController::class, 'GetTasks'])->whereNumber('sub_topic_id')->name('getTasks');

Route::post('tasks/ajax_answer_check', [AjaxController::class, 'AnswerCheck'])->name('ajax_answer_check');



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
