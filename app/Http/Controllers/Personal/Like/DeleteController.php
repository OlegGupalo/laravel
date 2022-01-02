<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post) {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.like.index');
    }
}
