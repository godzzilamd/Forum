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
        $role = Role::where('name', 'user')->first();
        if (!$user or $user->hasRole($role))
            $categories = Category::where('isStaff', 1)->paginate(20);
        else
            $categories = Category::paginate(20);
        return view('forms.view', compact(['categories']));
    }
}
