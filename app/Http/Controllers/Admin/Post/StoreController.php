<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(PostRequest $req)
    {    
        $data = $req->validated();
        $this->service->store($data);
        // try {
        //     $tagIds = $data['tag_ids'];
        //     unset($data['tag_ids']);
        //     $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        //     $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        //     $post = Post::firstOrCreate($data);
        //     $post->tags()->attach($tagIds);
        // } catch (\Exception $exception) {
        //     abort(404);
        // }
        return redirect()->route('admin.post.index');
    }
}
