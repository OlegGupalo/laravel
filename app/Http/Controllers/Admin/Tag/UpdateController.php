<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\Category\StoreRequest;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $req, Tag $tag)
    {
        $data = $req->validated();
        $tag->update($data);
        return view('admin.tags.show', compact('tag'));
    }
}
