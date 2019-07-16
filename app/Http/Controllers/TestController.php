<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $user = new User();
        $user->email = 'dgdffddfg@dg.com';
        $user->password = 'sgg';
        $user->name = 'sdaf';
        $user->tag = $user->newTag($user->name);
        $user->avatar = 'dfgsd';
        $user->online = false;
        $user->save();
        return response()->json($user);
    }
}
