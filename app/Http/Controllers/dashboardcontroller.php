<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    public function index (User $user )
    {
    // $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('dashboard',);
    }

    // public function userspost(User $user){
    //     $posts = $user->posts()->latest()->paginate(10);
    //     return view('users.posts',['user'=> $posts]);

    // }
}
