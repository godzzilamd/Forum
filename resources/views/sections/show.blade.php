@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/category/{{ $section->category->id }}">{{ $section->category->title }}</a>
                @foreach($address as $location)
                    <i class='fas fa-angle-double-right'></i>
                    <a href="/section/{{ $location['id'] }}">{{ $location['title'] }}</a>
                @endforeach
                <i class='fas fa-angle-double-right'></i>
                <a>{{ $section->title }}</a>
            </div>
        </div>
        <div class="col-md-8 d-flex flex-row-reverse">
            <div class="mr-2 d-flex">
                @if (Auth::user())
                    <div><a href="/section/{{$section->id}}/edit" class="btn btn-info m-1">Edit</a></div>
                    <div>
                        {{ Form::open(['action' => 'SectionController@create', 'method' => 'GET']) }}
                            <input type="hidden" name="category_id" value="{{$section->id}}">
                            <input type="hidden" name="type" value="s">
                            <button href="/section/create" class="btn btn-info m-1">New Section</button>
                        {{ Form::close() }}
                    </div>
                    <div>
                        {{ Form::open(['action' => 'TopicController@create', 'method' => 'GET']) }}
                            <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                            <button href="/topic/create" class="btn btn-info m-1">New Topic</button>
                        {{ Form::close() }}
                    </div>
                @endif
            </div>
            <div class="mt-1">
                {{$rows->links()}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container bg-white pt-3">
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
                    <a style="text-decoration: none" class="text-dark" href="/topic/{{$topic->id}}?page={{floor(($posts->count()-1)/20)+1}}#{{$posts->count()}}">
                        <h2 style="font-size: 50px" class="float-right">
                            {{$posts->count()}}
                        </h2>
                    </a>
                    <br>
                    {{$lastPost->updated_at}},
                    @if($lastPost->user->isOnline())
                        <img src="/storage/user/on-off2.png">
                    @else
                        <img src="/storage/user/on-off1.png">
                    @endif
                    {{$lastPost->user->name}}
                    <span class="ml-5">
                        Started by
                        @if($firstPost->user->isOnline())
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
@endsection
