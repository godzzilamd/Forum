<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = Topic::create($request->all());

        return redirect('topics')->with('success', 'Topic was saved with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
//    public function show(Topic $topic)
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $topic->section_id = $request->input('section_id');
        $topic->title = $request->input('title');
        $topic->post_it = $request->input('post_id') == 'on' ? true : false;
        $topic->closed = $request->input('closed') == 'on' ? true : false;
        $topic->save();
        return redirect('topics')->with('success', 'Topic was modified by success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect('topics')->with('success', 'Topic was deleted by success');
    }
}
