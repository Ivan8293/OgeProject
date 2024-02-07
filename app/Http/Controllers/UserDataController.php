<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserDataController extends Controller
{
    public function change_name_form()
    {
        IndexController::TopicsToSession();

        $current_name = Auth::user()->name;
        return view('user_data.change_name_form')->with(['current_name' => $current_name]);
    }

    public function change_name(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'            
        ]);

        User::where('id', Auth::id())->update(['name' => $request->name]);

        return redirect('personal_account');
    }
}
