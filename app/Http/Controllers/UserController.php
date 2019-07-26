<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Carbon\Carbon;
use App\Http\Controllers\CategoryController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function show_upload(User $user)
    {
        return view('user.upload', compact('user'));
    }

    public function upload(Request $request, User $user)
    {
        $user->avatar = ($n = $this->uploadImage($request->file('photo'), 'user', $user->name))  ? $n : $user->avatar;

        $user->save();

        return redirect('/user/' . $user->id)->with('success', $user->name . ' was updated with success');
    }

    public static function uploadImage($image, $path, $user_name)
    {
        if ($image) {
            $filenamewithextension = $image->getClientOriginalName();
            
            $filenametostore = md5(Carbon::now()) . '_' . $filenamewithextension;

            $image->storeAs('public/' . $path, '/' . $user_name . '/16_' . $filenametostore);
            $image->storeAs('public/' . $path, '/' . $user_name . '/100_' . $filenametostore);

            $thumbnailpath = public_path('storage/' . $path . '/' . $user_name . '/100_' . $filenametostore);

            $img = Image::make($thumbnailpath)->resize(100, 100);   

            $img->save($thumbnailpath);

            $thumbnailpath = public_path('storage/' . $path . '/' . $user_name . '/16_' . $filenametostore);

            $img = Image::make($thumbnailpath)->resize(16, 16);

            $img->save($thumbnailpath);

            return $filenametostore;
        }
        return null;
    }
}
