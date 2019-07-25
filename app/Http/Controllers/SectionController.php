<?php

namespace App\Http\Controllers;

use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Section;
use App\Category;
use DB;
use Illuminate\Pagination\Paginator;
use Image;
use App\Http\Requests\UpdateSection;
use App\Http\Requests\CreateSection;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Input;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'here1';
        $sections = Section::all();

        return response()->json($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('sections.children')->get();

        return view('sections.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSection $request)
    {
        $newSection = new Section();
        if ($request->input('type') == 's') {
            if (Section::find($request->input('category_id'))->parent_id)
                return redirect('/section/create')->with('error', 'you can not add a section to subsection');
            $newSection->parent_id = $request->input('category_id');
            $newSection->category_id = Section::find($request->input('category_id'))->first()->category_id;
        } else {
            $newSection->parent_id = NULL;
            $newSection->category_id = $request->input('category_id');
        }
        $newSection->avatar = ($n = $this->uploadImage($request->file('photo'), 'category')) ? $n : 'storage/section/section.png';
        $newSection->title = $request->input('title');
        $newSection->save();
        return redirect("/section/$newSection->id");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
//        $data = array();
        $rows = $section->children()->select(DB::raw('(true) as is_section, id'))->union($section->topics()->select(DB::raw('(false) as is_section, id')))->paginate(3);
        $data['sections'] = Section::whereIn('id', $rows->where('is_section', '1')->pluck('id'))->get();
        $data['topics'] = Topic::whereIn('id', $rows->where('is_section', '0')->pluck('id'))->orderBy('post_it', 'desc')->get();
        return view('sections.show', compact(['section', 'data', 'rows']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $categories = Category::with('sections.children')->get();

        return view('sections.edit', compact(['section', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSection $request, Section $section)
    {
        if ($request->input('type') == 's') {
            if (Section::find($request->input('category_id'))->parent_id)
                return redirect('/section/'.$section->id.'/edit')->with('error', 'you can not add a section to subsection');
            $section->parent_id = $request->input('category_id');
            $section->category_id = Section::find($request->input('category_id'))->first()->category_id;
        } else {
            $section->parent_id = NULL;
            $section->category_id = $request->input('category_id');
        }
        $section->avatar = ($n = $this->uploadImage($request->file('photo'), 'category')) ? $n : $section->avatar;
        $section->title = $request->input('title');
        $section->save();
        return redirect("/section/$section->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect('forums')->with('success', 'Section was deleted');
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
            $filenametostore = $filename . '_' . md5(Carbon::now()) . '.' . $extension;
            $image->storeAs('public/category', $filenametostore);
            $thumbnailpath = public_path('storage/' . $path . '/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(30, 30);
            $img->save($thumbnailpath);
            return 'storage/' . $path . '/' . $filenametostore;
        }
        return null;
    }
}
