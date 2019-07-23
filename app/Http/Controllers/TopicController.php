<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('topics.create')->with(['section_id' => $request->input('section_id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->section_id = $request->input('section_id');
        $topic->title = $request->title;
        $topic->save();

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->topic_id = $topic->id;
        $post->body = $request->input('body');
        $post->save();

        return redirect("/topic/$topic->id")->with('success', 'Topic was saved with success');
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
        $posts = $topic->posts()->paginate(20);
        $i = 1 + $posts->perPage() * $posts->currentPage() - $posts->perPage();
        foreach ($posts as $post) {
            $post->order = $i++;
        }
        return view('topics.show', compact(['topic', 'posts']));
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
        $topic->post_it = $request->input('post_it') == 'on' ? true : false;
        $topic->closed = $request->input('closed') == 'on' ? true : false;
        $topic->save();
        return redirect("/topic/$topic->id")->with('success', 'Topic was modified by success');
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

        return redirect("/section/" . $topic->section->id)->with('success', 'Topic was deleted by success');
    }
}
