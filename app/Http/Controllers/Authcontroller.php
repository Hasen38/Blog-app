<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function register(Request $request)
    {
           $fields = $request->validate ([
                'username' => ['required','max:20'],
                'email' => ['required','email','unique:users'],
                'password' => ['required']
              ]);

      $user = User::create($fields);
    Auth::login($user);
    return redirect()->route('home');

    }
  public function login (Request $request)
  {

    $fields = $request->validate([

        'email' => ['required','email'],
        'password'=>['required']
    ]);
    // dd($fields);
    if (Auth::attempt($fields,$request->remember)) {
        return redirect()->route('dashboard');
    } else {
        return back()
        ->withErrors('failed','The provided credetials do not match');
    }

  }
  public function logout(Request $request)
  {

  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');

  }



    }




