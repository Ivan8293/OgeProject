<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use App\Models\User;
// use App\Models\Teacher;
// use App\Models\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:teacher');
        $this->middleware('guest:student');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Student::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showTeacherRegisterForm()
    {
        return view('auth.register', ['url' => 'teacher']);
    }

    public function showStudentRegisterForm()
    {
        return view('auth.register', ['url' => 'student']);
    }


    protected function createTeacher(Request $request)
    {
        // $this->validator($request->all())->validate();
        // $teacher = Teacher::create([
        //     'last_name' => $request['last_name'],
        //     'name' => $request['name'],
        //     'patronymic' => $request['patronymic'],
        //     'login' => $request['login'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        // ]);
        // return redirect()->intended('login/teacher');

        return view("verify-email-teacher");
    }

    protected function createStudent(Request $request)
    {
        // // $this->validator($request->all())->validate();
        // $student = Student::create([
        //     'name' => $request['name'],
        //     'login' => $request['login'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        // ]);
        // return redirect()->intended('login/student');

        return view("verify-email-student");
    }
}
