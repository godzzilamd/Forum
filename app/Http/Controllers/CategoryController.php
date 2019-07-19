<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
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
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
        $category->avatar = ($n = Photo::uploadImage($request->file('photo'), 'category'))  ? $n : $category->avatar;
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
    public function update(CategoryRequest $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->isStaff = $request->input('isStaff') == 'on' ? true : false;
        $category->avatar = ($n = Photo::uploadImage($request->file('photo'), 'category'))  ? $n : $category->avatar;
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
