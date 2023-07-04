<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{

    public function login(Request $request)
    {
//        $loginData = $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if(!Auth::guard()->attempt($loginData)){
//            return response(['message' => 'Invalid Credentials'], 403);
//        }
//        //$request->authenticate();
//
//        //$request->session()->regenerate();
//        $access_token = $request->session()->token();
//        dd($access_token);
//
//        return response(
//            [
//                'user' => Auth::user(),
//                'access_token' => $access_token,
//            ]);
    }
}
