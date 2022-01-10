<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Post\Comment\StoreRequest;

class AllCommentsController extends Controller
{
    public function __invoke() {
        $data = Comment::all();
        return $data;
    }
}
