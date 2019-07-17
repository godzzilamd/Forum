<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    public function myrandom($name) 
    {
        $random = random_int(1, 9999);

        if (!User::where('name', $name)->exists())
            return '0000';
        elseif (!User::where('name', $name)->where('tag', $random)->exists())
            return sprintf("%04d", $random);

        return $this->myrandom($name);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->role_id = 4;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->tag = $this->myrandom($data['name']);
        $user->save();

        return $user;

        
        
        // return User::create([
        //     'name' => $data['name'],
        //     'role_id' => 4,
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'tag' => newTag($data['name'])
        // ]);
    }
}
