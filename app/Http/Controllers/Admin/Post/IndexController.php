<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = Post::all();
        return view('admin.posts.index', compact('post'));
    }
}
