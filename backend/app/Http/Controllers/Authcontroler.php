<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroler extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            "fullname"=> "required|max:20",
            "email"=> "required|email|unieque:users",
            "password"=> "required|min:6",
             "password_confirmation"=> "required|confirmed",
           ]);
           $user = user::create($fields);
           $token = $user->createToken($request->fullname);
           return [
            'user'=> $user,
            "token"=> $token->PlainTexttoken
           ];
    }
}
