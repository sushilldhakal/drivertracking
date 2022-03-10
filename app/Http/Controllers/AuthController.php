<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendOTP;
use App\Http\Requests\UserLogin;
use App\Models\User;

class AuthController extends Controller
{
    
    /**
     * Perform login of the user
     */

    public function login(UserLogin $request)
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

}
