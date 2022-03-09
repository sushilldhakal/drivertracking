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
        return redirect('/punch-in');
    }   

    public function loginUsingOTP(SendOTP $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        $user->sendOTP(for: 'login');

        activity('user')
                ->performedOn($user)
                ->causedBy($user)
                ->withProperties($request->validated())
                ->log('OTP has been created');

        return ['message'=>'OTP has been sent.'];
    }
}
