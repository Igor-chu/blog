<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];

        $data['usersCount'] = User::query()->count();
        $data['postsCount'] = Post::query()->count();
        $data['categoriesCount'] = Category::query()->count();
        $data['tagsCount']= Tag::query()->count();

        return view('admin.main.index', compact('data'));
    }
}
