<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts;
        return view('personal.likes.index', compact('posts'));
    }
}
