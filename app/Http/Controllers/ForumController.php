<?php

namespace App\Http\Controllers;

use App\Category;
use App\Role;
use App\User;

class ForumController extends Controller
{

    public function index()
    {
        if (!auth()->user() || auth()->user()->role_id == '4')
            $categories = Category::where('isStaff', 1)->get();
        else
            $categories = Category::with('sections')->get();
        return view('forms.view', compact(['categories']));
    }
}
