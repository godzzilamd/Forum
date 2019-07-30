<?php

namespace App\Http\Controllers;

use App\Topic;
use Carbon\Carbon;
use App\Section;
use App\Category;
use DB;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\UpdateSection;

class SectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->input('category_id')) {
            $parentName = Category::where('id', $request->input('category_id'))->pluck('title')->first();
            $parent_id = $request->input('category_id'); 
            $type = $request->input('type');
        }
        else {
            $parentName = 'Category';
            $parent_id = 1;
            $type = $request->input('type');
        }
        $categories = Category::with('sections')->get();

        return view('sections.create', compact(['categories', 'parentName', 'parent_id', 'type']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSection $request)
    {
        $newSection = new Section();
        $this->uploadStore($request, $newSection);
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
        if (!$section->category)
            abort(404);
        $rows = $section->children()->select(DB::raw('(true) as is_section, id'))->union($section->topics()->select(DB::raw('(false) as is_section, id')))->paginate(20);
        $data['sections'] = Section::whereIn('id', $rows->where('is_section', '1')->pluck('id'))->get();
        $data['topics'] = Topic::whereIn('id', $rows->where('is_section', '0')->pluck('id'))->orderBy('post_it', 'desc')->get();
        $address = array();
        $parentSection = $section->parent;
        while ($parentSection) {
            $address[] = ['title' => $parentSection->title, 'id' => $parentSection->id];
            $parentSection = $parentSection->parent;
        }
        $address = array_reverse($address);
        return view('sections.show', compact(['section', 'data', 'rows', 'address']));
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
     * @param UpdateSection $request
     * @param Section $section
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(UpdateSection $request, Section $section)
    {
        if($request->input('delete') == 'on')
            return $this->destroy($section);
        $this->uploadStore($request, $section);
        return redirect("/section/$section->id");
    }

    /**
     * @param Section $section
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
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
            $image->storeAs('public/section', $filenametostore);
            $thumbnailpath = public_path('storage/' . $path . '/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(30, 30);
            $img->save($thumbnailpath);
            return 'storage/' . $path . '/' . $filenametostore;
        }
        return null;
    }

    /**
     * @param UpdateSection $request
     * @param Section $section
     */
    protected function uploadStore(UpdateSection $request, Section $section)
    {
        if ($request->input('type') == 's') {
            $section->parent_id = $request->input('category_id');
            dd(Section::find($request->input('category_id')));
            $section->category_id = Section::find($request->input('category_id'))->category_id;              
        } else {
            $section->parent_id = NULL;
            $section->category_id = $request->input('category_id');
        }
        $section->avatar = ($n = $this->uploadImage($request->file('photo'), 'category')) ? $n : ($section->avatar ? $section->avatar : 'storage/section/section.png');
        $section->title = $request->input('title');
        $section->save();
    }
}
