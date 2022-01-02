<?php 

namespace App\Service;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostService {
	public function store($data)
	{
		try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exception) {
            abort(500);
        }
	}
	public function update($data, $post) {
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            if(isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if(isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            $post->tags()->sync($tagIds);
        } catch (Exception $e) {
             abort(500);
        }

        return $post;
	}
}