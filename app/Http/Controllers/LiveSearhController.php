<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveSearhController extends Controller
{
    function index()
    {
        return view('live_search');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function action(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $constituencies = LanguageConstituencies::where('name', 'like', '%' . $query . '%')->with('constituency')->take(10)->get();
            $candidates = Candidate::where('name', 'like', '%' . $query . '%')->take(10)->get();
            $sections = Section::where('address', 'like', '%' . $query . '%')->take(10)->get();
        }
        return response()->json(['candidates' => $candidates ?? [], 'constituencies' => $constituencies ?? [], 'sections' => $sections ?? []]);
    }
}
