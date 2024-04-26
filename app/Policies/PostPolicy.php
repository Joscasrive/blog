<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function update(User $user , Post $post)
    {
        return $user->id === $post->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }
    public function published(?User $user , Post $post){
        return $post->status == 2
        ? Response::allow()
        : Response::deny('This post is not finished.');

    }
}
