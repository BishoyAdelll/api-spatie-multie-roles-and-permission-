<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
   public function login(LoginRequest $request){
     if(!Auth::attempt($request->only('email','password'))){
        Helper::sendError('Email Or Password is wroing');
     }
     return new UserResource(auth()->user());
   }
}
