<?php

namespace App\Http\Controllers;

use App\Category;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $role = Role::where('name', 'user');
        if (!$user or $user->hasRole($role))
            $categories = Category::where('isStaff', 1)->get();
        else
            $categories = Category::all();
        return view('forms.view', compact(['categories']));
    }
}
