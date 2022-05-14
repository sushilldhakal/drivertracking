<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendOTP;
use App\Http\Requests\UserLogin;
use App\Http\Requests\AdminLogin;
use App\Models\User;

class AuthController extends Controller
{
    
    /**
     * Perform login of the user
     */

    public function punchIn(UserLogin $request)
    {
        User::wherePin($request->get('pincode'))->first()->login();

        return redirect('/punch-in');
    }   

    public function break()
    {
        $user = auth()->user();
        $user->break = !$user->break;
        $user->save();

        return to_route('main');
    }

    public function adminLogin(AdminLogin $request)
    {
        if(auth()->attempt($request->only(['email','password'],['is_admin'=>true]))) {
            return redirect('/admin');
        }

        return back();
    }

}
