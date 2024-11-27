<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function register(Request $request)
    {
        $fields=$request->validate([
            "name"=> "required|",
            "email"=> "required|email|unique:users",
            "password"=> "required|confirmed",
            ]);
            
            $user= user::create($fields);
            $token= $user->createToken($request->name)->plainTextToken;
            return [
                "token"=> $token,
                "user" =>$user
            ];
    }

    public function login(Request $request)
    {
         $request->validate([
            "email"=> "required|exist:users",
            "password"=> "required"
            ]);

            $user= User::where("email",$request->email)->first();
            if(!$user||!Hash::check($request->password,$user->password)){
                return [
                    "message"=>"The provided credentials are incorrect"
                    ];  
    } else {
        $token= $user->createToken($request->name)->plainTextToken;
    return [
        "user" =>$user,
        "token"=> $token
        ];
    }
}

public function logout(Request $request)
{
    $request->user()->tokens()->delete();
}
}