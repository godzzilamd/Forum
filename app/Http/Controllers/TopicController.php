<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Post;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTopic;
use App\Http\Requests\UpdateTopic;

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
    public function store(CreateTopic $request)
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
        $topic = Topic::where('id', $id)->first();
        // $users = User::with('likes')->get();
        if (!$topic)
            return redirect('/forums')->with('error', 'Does not exists this topic');
        $posts = $topic->posts()->with('user', 'likes')->paginate(20);
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
     * @param UpdateTopic $request
     * @param Topic $topic
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(UpdateTopic $request, Topic $topic)
    {
        $topic->section_id = $request->input('section_id');
        $topic->title = $request->input('title');
        $topic->post_it = $request->input('post_it') == 'on' ? true : false;
        $topic->closed = $request->input('closed') == 'on' ? true : false;
        $topic->save();
        return redirect("/topic/$topic->id")->with('success', 'Topic was modified by success');
    }

    /**
     * @param Topic $topic
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect("/section/" . $topic->section->id)->with('success', 'Topic was deleted by success');
    }

    // select `users`.*, `likes`.`post_id` as `pivot_post_id`, `likes`.`user_id` as `pivot_user_id` 
    //     from `users` inner join `likes` on `users`.`id` = `likes`.`user_id` 
    //         where `likes`.`post_id` in (1, 2, 3, 5, 17, 18, 19, 21, 33, 34, 35, 37, 49, 50, 51, 53, 65, 66, 67, 69)

    // select `users`.*, `likes`.`post_id` as `pivot_post_id`, `likes`.`user_id` as `pivot_user_id` 
    //     from `users` inner join `likes` on `users`.`id` = `likes`.`user_id` 
    //         where `likes`.`post_id` = 1 and `id` = 2 limit 1
}
