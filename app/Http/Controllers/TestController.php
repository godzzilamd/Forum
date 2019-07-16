<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Sanction;
use App\Post;
use App\Photo;
use App\Topic;
use App\Section;
use App\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $post = Post::find(4);
        $topic = Topic::find(1);
        $section = Section::find(4);
        $category = Category::find(1);
        return response()->json($category->sections);
    }
}
