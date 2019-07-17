<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request) {

        if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {

            $user = User::where('email', $request->input('email'))->first();

        }   elseif (strpos($request->input('email'), '#')) {

            $given_row = explode('#', $request->input('email'));
            $user = User::where('name', $given_row[0])->where('tag', $given_row[1])->first();
            
        }   else {

            $user = User::where('name', $request->input('email'))->where('tag', '0000')->first();
        }

        if (Hash::check($request->input('password'), $user->password)) {

            $this->guard()->login($user);
        }

        return redirect()->route('login')->with('error', 'Numele de utilizator sau parola este gresita');
    }
}
