<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Image;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function store(CreateCategory $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
        $category->avatar = ($n = $this->uploadImage($request->file('photo'), 'category'))  ? $n : 'storage/category/category.jpg';
        $category->save();
        return redirect('forums')->with('success', 'Category '.$category->title.' was saved with success');
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

    public function show(Category $category)
    {
        return view('category.show', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
        $category->avatar = ($n = $this->uploadImage($request->file('photo'), 'category'))  ? $n : $category->avatar;
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

    /**
     * @param $image
     * @param $path
     * @return string|null
     */
    public static function uploadImage($image, $path)
    {
        if ($image) {
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $filename . '_' . md5(Carbon::now()). '.' . $extension; // md5
            $image->storeAs('public/'.$path, $filenametostore);
            $thumbnailpath = public_path('storage/' . $path . '/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(30, 30); // encode
            $img->save($thumbnailpath);
            return 'storage/' . $path . '/' . $filenametostore;
        }
        return null;
    }
}
