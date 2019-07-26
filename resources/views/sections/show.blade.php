@extends('layouts.app')

@section('subheader')
    {{ Form::open(['action' => 'TopicController@create', 'method' => 'GET']) }}
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/forums">{{ $section->category->title }}</a>
                @if ($section->parent_id > 0)
                    <i class='fas fa-angle-double-right'></i>
                    <a href="/section/{{ $section->parent->id }}">{{ $section->parent->title }}</a>
                @endif
                <i class='fas fa-angle-double-right'></i>
                <a>{{ $section->title }}</a>
            </div>
        </div>
        <div class="col-md-8 d-flex flex-row-reverse">
            <div class="mr-2">
                @if (Auth::user())
                    <a href="/section/{{$section->id}}/edit" class="btn btn-info m-1">Edit</a>
                    <a href="/section/create" class="btn btn-info m-1">New Section</a>
                    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                    <button href="/topic/create" class="btn btn-info m-1">New Topic</button>
                @endif
            </div>
            <div class="mt-1">
                {{$rows->links()}}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('content')
    <div class="container bg-white">
        <div>
            @include('sections._partials.section_list', ['sections' => $data['sections']])
        </div>
        <hr class="shadow">
        <div class="pb-3">
            @foreach($data['topics'] as $topic)
                @php
                    $posts = $topic->posts;
                    $lastPost = $posts[count($posts)-1];
                    $firstPost = $posts[0];
                @endphp
                <div class="my-2 ml-5 border-roundest p-4">
                    @if($topic->post_it)
                        <i class="material-icons">attachment</i>
                    @endif
                    @if($topic->closed)
                        <i class="fas fa-lock"></i>
                    @endif
                    <a class="text-dark" style="text-decoration: none;font-size:15px" href="/topic/{{$topic->id}}">
                        <strong>{{$topic->title}}</strong>
                    </a>
                    <a style="text-decoration: none" class="text-dark" href="/topic/{{$topic->id}}?page={{floor($posts->count()/20)}}#{{$posts->count()}}">
                        <h2 style="font-size: 50px" class="float-right">
                            {{$posts->count()}}
                        </h2>
                    </a>
                    <br>
                    {{$lastPost->updated_at}},
                    @if($lastPost->user->online)
                        <img src="/storage/user/on-off2.png">
                    @else
                        <img src="/storage/user/on-off1.png">
                    @endif
                    {{$lastPost->user->name}}
                    <span class="ml-5">
                        Started by
                        @if($firstPost->user->online)
                            <img src="/storage/user/on-off2.png">
                        @else
                            <img src="/storage/user/on-off1.png">
                        @endif
                        {{$firstPost->user->name}}
                        on
                        {{$firstPost->created_at}}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .border-roundest {
            border-style: double;
            border-color: dodgerblue;
            border-radius: 20px;
        }
    </style>
@endsection
