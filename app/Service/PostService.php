<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::query()->firstOrCreate($data);
            $post->tags()->attach($tagIds);

            Db::commit();

        } catch (\Exception $exception) {

            Db::rollBack();

            abort(500);

        }

    }

    public function update($data, $post)
    {
        try {

            Db::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            if(isset($data['preview_image'])){
                Storage::disk('public')->delete('/images', $post['preview_image']);
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if(isset($data['main_image'])){
                Storage::disk('public')->delete('/images', $post['main_image']);
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            $post->tags()->sync($tagIds);

            Db::commit();

        } catch (Exception $exception) {

            Db::rollBack();

            abort(500);
        }

        return $post;
    }

}