<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Ui\Presets\React;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showTeacherLoginForm()
    {
        return view('auth.login', ['url' => 'teacher']);
    }

    public function teacherLogin(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:8'
        // ]);

        // if (Auth::guard('teacher')->attempt(['email' => $request->email,
        //     'password' => $request->password], $request->get('remember')))
        // {
        //     return redirect()->intended('/teacher/classes');
        // }

        return redirect()->route("login_teacher");
    }


    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:8'
        // ]);

        // if (Auth::guard('student')->attempt(['email' => $request->email, 
        //     'password' => $request->password], $request->get('remember')))
        // {
        //     return redirect()->intended('/student');
        // }

        return redirect()->route("login_student");
    }
}