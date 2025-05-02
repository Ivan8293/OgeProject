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
use App\Http\Controllers\HomeworkClassController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\Pages\Student\TrajectoryController;
use App\Http\Controllers\Pages\Common\TopicsController;
use App\Http\Controllers\Pages\Student\StatisticsController;
use App\Http\Controllers\Pages\Common\KIMsController;


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
Route::get('/test', function () {
    return view('my_verstka.home_parent');
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
Route::get('/home', [TopicsController::class, 'index'])->name("unregister_user");
Route::get('/home/teacher/{page?}', [TeacherClassController::class, 'index'])->name('teacher');
Route::get('/home/student', [TrajectoryController::class, 'index'])->name("student");



Route::get('/home/teacher/add_class', [TeacherClassController::class, 'create'])->name('add_class');
Route::post('/home/teacher/store_class', [TeacherClassController::class, 'store'])->name('store_class');
Route::get('/home/teacher/edit_class/{id}', [TeacherClassController::class, 'edit'])->name('edit_class');
Route::post('/home/teacher/update_class', [TeacherClassController::class, 'update'])->name('update_class');
Route::get('/home/teacher/delete_class/{id}', [TeacherClassController::class, 'destroy'])->name('delete_class');


// TODO: не реализовано
Route::get('/home/teacher/homeworks/{page?}', [HomeworkController::class, 'index'])->name('homeworks');
Route::get('/home/teacher/homework/add_homework', [HomeworkClassController::class, 'create'])->name('add_homework');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');


// TODO: не реализовано
Route::get('/home/KIMs/{page?}', [KIMsController::class, 'index'])->name('KIMs');
Route::get('/home/KIM/{topic_id?}', [KIMsController::class, 'create'])->name('open_kim');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');


// TODO: не реализовано
Route::get('/home/topics/{page?}', [TopicsController::class, 'index'])->name('topics');
Route::get('/home/topic/{topic_id}', [TopicController::class, 'index'])->name('open_topic');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');


// TODO: не реализовано
Route::get('/home/tasksBank/{page?}', [TaskController::class, 'indexBank'])->name('tasks_bank');
Route::get('/home/teacher/homework/add_homework', [HomeworkClassController::class, 'create'])->name('add_homework');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');




// TODO: не реализовано
Route::get('/home/student/trajectory/{page?}', [TrajectoryController::class, 'index'])->name('trajectory');
Route::get('/home/student/entrance_test', [TrajectoryController::class, 'index_entrance_test'])->name('entrance_test');

Route::get('/home/teacher/homework/add_homework', [HomeworkClassController::class, 'create'])->name('add_homework');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');


// TODO: не реализовано
Route::get('/home/student/statistics/{page?}', [StatisticsController::class, 'index'])->name('statistics');
Route::get('/home/teacher/homework/add_homework', [HomeworkClassController::class, 'create'])->name('add_homework');
Route::post('/home/teacher/homework/store_homework', [HomeworkClassController::class, 'store'])->name('store_homework');
Route::get('/home/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
Route::post('/home/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
Route::get('/home/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');



Route::get('/home/student/task/{topic_id}', [TaskController::class, 'index'])->name('tasks');



Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Auth::routes(); 

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

