<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\MainPageController;
use App\Http\Controllers\TeacherClassController;

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

Route::view('/tmp', 'list');

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
Route::get('/businessCard', [MainPageController::class, 'index'])->name('businessCard');
Route::get('/topics', [IndexController::class, 'GetTopics'])->name('topics');
Route::get('topic/{id}', [IndexController::class, 'GetTopic'])->whereNumber('id')->name('getTopic');
Route::get('tasks/{sub_topic_id}', [IndexController::class, 'GetTasks'])->whereNumber('sub_topic_id')->name('getTasks');

Route::post('tasks/ajax_answer_check', [AjaxController::class, 'AnswerCheck'])->name('ajax_answer_check');



// require __DIR__.'/auth.php';

// новыйе маршруты для авторизации и регистрации
// работают с 2 типами пользователей student и teacher

Route::get('/login/teacher', [LoginController::class, 'showTeacherLoginForm'])->name("login_teacher");
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm'])->name("login_student");
Route::get('/register/teacher', [RegisterController::class, 'showTeacherRegisterForm'])->name("register_teacher");
Route::get('/register/student', [RegisterController::class, 'showStudentRegisterForm'])->name("register_student");

Route::post('/login/teacher', [LoginController::class, 'teacherLogin']);
Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/register/teacher', [RegisterController::class, 'createTeacher']);
Route::post('/register/student', [RegisterController::class, 'createStudent']);
//->middleware('auth')
Route::get('/home', [HomePageController::class, 'guest_index']);
Route::get('/home/teacher', [TeacherClassController::class, 'index'])->name('teacher');
Route::get('/home/student', [HomePageController::class, 'student_index']);



Route::get('/home/teacher/add_class', [TeacherClassController::class, 'create'])->name('add_class');
Route::post('/home/teacher/store_class', [TeacherClassController::class, 'store'])->name('store_class');
Route::get('/home/teacher/edit_class/{id}', [TeacherClassController::class, 'edit'])->name('edit_class');
Route::post('/home/teacher/update_class', [TeacherClassController::class, 'update'])->name('update_class');
Route::get('/home/teacher/delete_class/{id}', [TeacherClassController::class, 'destroy'])->name('delete_class');



Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
