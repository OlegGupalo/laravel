<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\Personal\Comment\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $req, Comment $comment)
    {
        $data = $req->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
}
