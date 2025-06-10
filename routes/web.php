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
use App\Http\Controllers\TaskOgeController;
use App\Http\Controllers\HomeworkTaskController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\AnswerController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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


// Route::get('/test', function () {
//     return view('my_verstka.home_parent');
// });


// Route::view('/tmp', 'list');

// Route::get('/dashboard', function () {
//     return redirect('topics');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     // тут мои маршруты, доступные только авторизированному пользователю
//     Route::get('/personal_account', [IndexController::class, 'personal_account'])->name('personal_account');
//     Route::get('/statistics', [IndexController::class, 'statistics'])->name('statistics');

//     //изменить данные пользователя
//     Route::get('/change_name_form', [UserDataController::class, 'change_name_form'])->name('change_name_form');
//     Route::post('/change_name', [UserDataController::class, 'change_name'])->name('change_name');
// });

Route::get('/student/statistics/topic', [IndexController::class, 'statistic'])->name('topic');
// //изначальные мои маршруты

// Route::get('/topics', [IndexController::class, 'GetTopics'])->name('topics');
// Route::get('topic/{id}', [IndexController::class, 'GetTopic'])->whereNumber('id')->name('getTopic');
// Route::get('tasks/{sub_topic_id}', [IndexController::class, 'GetTasks'])->whereNumber('sub_topic_id')->name('getTasks');




// маршрут для всех
Route::get('/', function () {
    return redirect('businessCard');
});

Route::get('/businessCard', [MainPageController::class, 'index'])->name('businessCard');

Route::get('/home', [TrajectoryController::class, 'index'])->name("unregister_user");
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/need_registration', [StudentController::class, 'need_registration_index'])->name("need_registration");
// Route::middleware(['auth:student', 'verified.guard:student'])->group(function () {
    Route::get('/student/entrance_test', [StudentController::class, 'index_entrance_test'])->name('entrance_test');
//});



// маршруты авторизации и регистрации
Route::get('/login/teacher', [LoginController::class, 'showTeacherLoginForm'])->name("login_teacher");
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm'])->name("login_student");
Route::get('/register/teacher', [RegisterController::class, 'showTeacherRegisterForm'])->name("register_teacher");
Route::get('/register/student', [RegisterController::class, 'showStudentRegisterForm'])->name("register_student");

Route::post('/login/teacher', [LoginController::class, 'teacherLogin']);
Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/register/teacher', [RegisterController::class, 'createTeacher']);
Route::post('/register/student', [RegisterController::class, 'createStudent']);



// группа маршутов, отвечающих за кнопки меню у студента
// доступ к ним сделан не через middleware auth:student
// т.к имеею доп логику. доступ прописан конкретно в контроллере
Route::middleware(['auth:student', 'verified.guard:student'])->group(function () {
    Route::get('/student/trajectory/{page?}', [TrajectoryController::class, 'index'])->name('trajectory');
});
Route::get('/student/statistics/{page?}', [StatisticsController::class, 'index'])->name('statistics');
Route::get('/tasksBank/{page?}', [TaskOgeController::class, 'index'])->name('tasks_bank');
Route::get('/topics/{page?}', [TopicsController::class, 'index'])->name('topics');
Route::get('/KIMs/{page?}', [KIMsController::class, 'index'])->name('KIMs');

//Route::middleware(['auth:teacher', 'ensureEmailIsVerifiedForGuard:teacher'])->group(function () {


// эти маршруты должны быть доступны у ученика в полной мере
// у учителя только для просмотра
// но чтобы не париться, временное решение, они доступны всем
Route::get('/KIM/{topic_id?}/{page?}', [KIMsController::class, 'create'])->name('open_kim');    
Route::get('/topic/{topic_id}', [TopicController::class, 'index'])->name('open_topic');    
Route::get('/taskBank/{task_oge_id?}/{is_homework?}/{page?}', [TaskOgeController::class, 'create'])->name('open_task_bank');   
Route::get('/student/task/{topic_id}', [TaskController::class, 'index'])->name('tasks');
Route::get('/homework/tasks/{homework_id}', [HomeworkTaskController::class, 'index'])->name('homework_tasks');


// маршруты студента
Route::middleware(['auth:student'])->group(function () {

    Route::get('/home/student/tasks/ajax_answer_check', [AjaxController::class, 'AnswerCheck'])->name('ajax_answer_check');
    //Route::get('/student', [TrajectoryController::class, 'index'])->name("student");  
    Route::get('/student', function () {
        return redirect()->route("trajectory");
    })->name("student"); 

    Route::get('/student/section/{section_id}/{page?}', [SectionController::class, 'index'])->name('section');     
    Route::get('/tasks_entrance', [TaskController::class, 'indexEntranceTasks'])->name("open_entrance_test");
});


// маршруты преподавателя
Route::middleware(['auth:teacher'])->group(function () {

    Route::middleware(['auth:teacher', 'verified.guard:teacher'])->group(function () {
        Route::get('/teacher/classes/{page?}', [TeacherClassController::class, 'index'])->name('teacher');  
    });
    Route::get('/teacher/class/{id}/students/{page?}', [TeacherClassController::class, 'showStudents'])->name('class.students');

    Route::get('/teacher/add_class', [TeacherClassController::class, 'create'])->name('add_class');
    Route::post('/teacher/store_class', [TeacherClassController::class, 'store'])->name('store_class');
    Route::get('/teacher/edit_class/{id}', [TeacherClassController::class, 'edit'])->name('edit_class');
    Route::post('/teacher/update_class', [TeacherClassController::class, 'update'])->name('update_class');
    Route::get('/teacher/delete_class/{id}', [TeacherClassController::class, 'destroy'])->name('delete_class');
    Route::get('/teacher/student_homework/{homework_id}/{student_id}/{class_id}', [TeacherClassController::class, 'showHomework'])->name('showHomework');

    Route::get('/class/addStudent/{class_id}', [StudentClassController::class, 'index'])->name('add_student');
    Route::post('/class/addStudentToClass', [StudentClassController::class, 'add'])->name('add_student_to_class');

    Route::get('/teacher/homeworks/{class_id?}/{page?}', [HomeworkController::class, 'index'])->name('homeworks');
    Route::get('/teacher/homework/{homework_id?}', [HomeworkTaskController::class, 'create'])->name('open_homework_');
    Route::get('/teacher/homework/add_homework_to_class/{class_id}/{homework_id}', [HomeworkClassController::class, 'add_to_class'])->name('add_homework_to_class');
    Route::post('/teacher/homework/update_deadline', [HomeworkClassController::class, 'update_deadline'])->name('update_deadline');

    Route::get('/teacher/homework_create', [HomeworkController::class, 'create_homework'])->name('create_homework');
    Route::get('/teacher/choose_homework_taks/{topic_id}', [HomeworkController::class, 'choose_homework_taks'])->name('choose_homework_taks');
    Route::get('/teacher/tasks_bank', [HomeworkController::class, 'back_to_tasks_bank'])->name('back_to_tasks_bank');
    Route::get('/teacher/set_homework_params', [HomeworkController::class, 'set_homework_params'])->name('set_homework_params');
    Route::post('/teacher/store_homework', [HomeworkTaskController::class, 'store'])->name('store_homework');


    Route::get('/teacher/homework/edit_homework/{id}', [HomeworkClassController::class, 'edit'])->name('edit_homework');
    Route::post('/teacher/homework/update_homework', [HomeworkClassController::class, 'update'])->name('update_homework');
    Route::get('/teacher/homework/delete_homework/{id}', [HomeworkClassController::class, 'destroy'])->name('delete_homework');  
    
});



Route::middleware(['update.activity'])->group(function () {
    Route::post('/update-active-time', function () {
        
    });
});



// пути до статичных форм, это временно, просто для скриншота
//временный марштур
Route::get('/tasks_results', [TaskOgeController::class, 'index_results']);


// Route::get('/home/addClass', function () {
//     return view("my_verstka.forms.add_class");
// })->name("addclass");

// Route::get('/home/editClass', function () {
//     return view("my_verstka.forms.edit_class");
// })->name("editclass");



Route::get('/home/editStudent', function () {
    return view("my_verstka.forms.edit_student");
});



// Route::get('/createHomework', function () {
//     $tasks = App\Models\task::where("task_oge_id", 18)->get();

//     return view("my_verstka.forms.create_homework", ["tasks" => $tasks]);
// });

// Route::get('/homeworkContent', function () {
//     $tasks = App\Models\task::where("task_oge_id", 18)->get();

//     return view("my_verstka.forms.homework_content", ["tasks" => $tasks]);
// });





// Route::get('/verify_notice', function () {
//     return view("my_verstka.verification_notice");
// })->name("verification.notice");


Route::post('/check-answer', [AnswerController::class, 'check'])->name('check.answer');



Route::prefix('student')->name('student.')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email-student');
    })->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route("trajectory");
    })->middleware(['signed'])->name('verification.verify');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user('student')->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->name('verification.send');
});



Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email-teacher');
    })->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route("teacher");
    })->middleware(['signed'])->name('verification.verify');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user('teacher')->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->name('verification.send');
});





Auth::routes(['verify' => true]); 

