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
            <div>
                {{$rows->links()}}
            </div>
            <div class="mr-2">
                @if (Auth::user())
                    <a href="/section/create" class="btn btn-info m-1">New Section</a>
                    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                    <button href="/topic/create" class="btn btn-info m-1">New Topic</button>
                @endif
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection

@section('content')
    <div class="container bg-white">
{{--        <div class="d-flex pt-2">--}}
{{--            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))--}}
{{--                <div class="dropdown ml-3" style="font-size:24px">--}}
{{--                    <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                        @if (Auth::user()->hasPermission(13))--}}
{{--                            <a class="dropdown-item" href="/section/{{ $section->id }}/edit">Edit</a>--}}
{{--                        @endif--}}
{{--                        {{ Form::open(['action' => ['SectionController@destroy', $section->id], 'method' => 'delete']) }}--}}
{{--                            @if (Auth::user()->hasPermission(15))--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <button class="dropdown-item" href="/section/{{ $section->id }}">Delete</button>--}}
{{--                            @endif--}}
{{--                        {{ Form::close() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
        <div>
            @foreach($data['sections'] as $section)
                <div class="my-2 ml-5 border-roundest p-4">
                    <a class="text-dark" style="text-decoration: none;font-size:20px" href="/section/{{$section->id}}">
                        <img src="/{{$section->avatar}}">
                        <strong>{{$section->title}}</strong>
                        @if($section->topics())
                            @php
                                $topic = $section->topics()->latest()->first();
                                $post = $topic->posts()->latest()->first();
                            @endphp
                            <div class="float-right"><h1>{{count($topic->posts)}}</h1></div>
                            <div class="float-right">{{$post->user->name}}</div>
                            <div class="float-right">
                                @if($post->user->online)
                                    <img src="/storage/user/on-off2.png">
                                @else
                                    <img src="/storage/user/on-off1.png">
                                @endif
                            </div>
                            <div class="float-right">{{$post->updated_at}},</div>
                            <div class="float-right pr-3"><h2>{{$topic->title}}</h2></div>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
        <hr class="shadow">
        <div class="pb-3">
            @foreach($data['topics'] as $topic)
                <div class="my-2 ml-5 border-roundest p-4">
                    @if($topic->post_it)
                        <i class="material-icons">attachment</i>
                    @endif
                    @if($topic->closed)
                        <i class="fas fa-lock"></i>
{{--                    @else--}}
{{--                        <i class="fas fa-open"></i>--}}
                    @endif
                    <a class="text-dark" style="text-decoration: none;font-size:15px" href="/topic/{{$topic->id}}">
                        <strong>{{$topic->title}}</strong>
                    </a>
                    <div class="d-flex">
                        <div>
                            @php
                                $posts = $topic->posts();
                                $lastPost = $posts->latest()->first();
                                $firstPost = $posts->first();
                            @endphp
                            {{$lastPost->updated_at}},
                            @if($lastPost->user->online)
                                <img src="/storage/user/on-off2.png">
                            @else
                                <img src="/storage/user/on-off1.png">
                            @endif
                            {{$lastPost->user->name}}
                        </div>
                        <div class="pl-4">
                            Started by
                            @if($firstPost->user->online)
                                <img src="/storage/user/on-off2.png">
                            @else
                                <img src="/storage/user/on-off1.png">
                            @endif
                            {{$firstPost->user->name}}
                            on
                            {{$firstPost->created_at}}
                        </div>

                    </div>
                    <div class="float-right"><h1>{{count($posts->get())}}</h1></div>
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