<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Post $comments)
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }
}
