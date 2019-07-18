<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;

class ForumController extends Controller
{
    //de afisat categoriile care sunt permise pentru user
    // dac are rol diferit de user afiseaza toate categoriile
    public function index()
    {
        $categories = Category::all();
        return view('forms.view', compact(['categories']));
    }
}
