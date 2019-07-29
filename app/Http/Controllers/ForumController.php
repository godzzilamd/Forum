<?php

namespace App\Http\Controllers;

use App\Category;

class ForumController extends Controller
{

    public function index()
    {
        if (!auth()->user() || auth()->user()->role_id == '4')
            $categories = Category::where('isStaff', 1)->get();
        else
            $categories = Category::with('parents')->get();
        return view('forms.view', compact(['categories']));
    }
}