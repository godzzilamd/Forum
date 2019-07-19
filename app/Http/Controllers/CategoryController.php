<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use function GuzzleHttp\Promise\queue;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.view', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
        if ($request->file('photo') != null) {
            $request->file('photo')->resize(320, 240);
            $category->avatar = md5($category->title).".jpg";
            $request->file('photo')->storeAs('public/category/', $category->avatar);
            $category->avatar = 'public/category/'.$category->avatar;
        }
        $category->save();
        return redirect('forums')->with('success', 'Category '.$category->title.' was saved with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
//        dd($request->file('photo'));
        $category->avatar = Photo::uploadImage($request->file('photo'), 'category');
//        if ($request->hasFile('photo')) {
//            $filenamewithextension = $request->file('photo')->getClientOriginalName();
//            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
//            $extension = $request->file('photo')->getClientOriginalExtension();
//            $filenametostore = $filename.'_'.time().'.'.$extension;
//            $request->file('photo')->storeAs('public/category', $filenametostore);
//            $thumbnailpath = public_path('storage/category/'.$filenametostore);
//            $img = Image::make($thumbnailpath)->resize(30, 30, function($constraint) {
//                $constraint->aspectRatio();
//            });
//            $img->save($thumbnailpath);
//            $category->avatar = 'storage/category/'.$filenametostore;
//        }
        $category->save();
        return redirect('forums')->with('success', 'Category '.$category->title.' was updated with success');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('forums')->with('success', 'Category was deleted');
    }
}
