<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $req, Post $post)
    {
        
        $data = $req->validated();
        $post = $this->service->update($data, $post);
        // $tagIds = $data['tag_ids'];
        // unset($data['tag_ids']);

        // $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        // $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        // $post->update($data);
        // $post->tags()->sync($tagIds);
        return view('admin.posts.show', compact('post'));
    }
}
