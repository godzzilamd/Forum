<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;

class ForumController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::with('sections')->get();
        return view('home')->with(['categories' => $categories, 'users' => $users]);
    }
}
