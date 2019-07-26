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
    public function show(Request $request, $name)
    {
        if ($request->input('tag'))
        {
            $user = User::where([
                'name' => $name,
                'tag' => $request->input('tag')
            ])->first();

        return view('user.show', compact('user'));
        }
        return null;
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
    
    public function show_upload(Request $request, $name)
    {
        if ($request->input('tag'))
        {
            $user = User::where([
                'name' => $name,
                'tag' => $request->input('tag')
            ])->first();

        return view('user.upload', compact('user'));
        }
        return null;
    }

    public function upload(Request $request, User $user)
    {
        $user->avatar = ($new_img = $this->uploadImage($request->file('photo'), $user->id))  ? $new_img : $user->avatar;

        $user->save();

        return redirect('/user/' . $user->name . '?tag=' . $user->tag)->with('success', $user->name . ' was updated with success');
    }

    protected function uploadImage($image, $user_id)
    {
        if ($image) {
            $dimension = [50, 100];
            $image_name = md5(Carbon::now()) . '.jpg';

            foreach ($dimension as $value) {

                $canvas = Image::canvas($value, $value, '000000');
                $image_obj = Image::make($image)->resize($value-2, $value-2);
                $canvas->insert($image_obj, 'center')->encode('jpg', 80);
                $canvas->save(storage_path('app/public/user/'). $user_id . '/' . $value . '_' . $image_name);
            }
            return $image_name;
        }
        unlink($image);
        return null;
    }

    public function remove_image(User $user) 
    {
        $user->avatar = '';
        $user->save();

        return redirect('/user/' . $user->name . '?tag=' . $user->tag)->with('user', $user);
    }
}
