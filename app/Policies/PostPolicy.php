<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
public function modify (User $user, Post $post){
    return $user->id === $post->user_id;
}

public function destroy (User $user, Post $post){
return $user->id === $post->user_id;
}
}
