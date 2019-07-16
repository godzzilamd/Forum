<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Sanction;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
//        $user = User::find(2);
        $sanction = Sanction::find(1);
        return response()->json($sanction->users);
    }
}
