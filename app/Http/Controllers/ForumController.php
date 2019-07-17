<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $categories = Category::with('sections')->get();
        return view('home')->with('categories', $categories);
    }
}
