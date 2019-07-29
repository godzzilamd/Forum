@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/forums">{{ $topic->section->category->title }}</a>
                <i class='fas fa-angle-double-right'></i>
                <a href="/section/{{ $topic->section->id }}">{{ $topic->section->title }}</a>
                <i class='fas fa-angle-double-right'></i>
                <a>{{ $topic->title }}</a>
            </div>
        </div>
        @if (Auth::user())
            <div class="col-md-8 pr-4 mt-1 d-flex flex-row-reverse">
                <div>{!!$posts->links()!!}</div>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container bg-white rounded shadow-sm pb-2">
        <div class="d-flex mb-3 pt-2">
            @if ($topic->closed)
                <div class="mt-2 mr-2">
                    <i class="fas fa-lock"></i>
                </div>
            @endif
            @if ($topic->post_it)
                <div class="mt-2 mr-2">
                    <i class="fas fa-thumbtack"></i>
                </div>
            @endif
            <div>
                <h2>{{$topic->title}}</h2>
            </div>
            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
            <div class="dropdown ml-3" style="font-size:24px">
                <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (Auth::user()->hasPermission(13))
                        <a class="dropdown-item" href="/topic/{{ $topic->id }}/edit">Edit</a>
                    @endif
                    @if (Auth::user()->hasPermission(15))
                    {{ Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'delete']) }}
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item">Delete</button>
                    {{ Form::close() }}
                    @endif
                </div>
            </div>
            @endif
        </div>
        @foreach($posts as $post)
        <div class="rounded p-1 mb-5" style="background-color:#ccffff">
            <div class="d-flex">
                <div class="d-flex col-md-11">
                    <div class="mx-1">
                        @if ($post->user->isOnline())
                            <img src="/storage/user/on-off2.png" width="15px">
                        @else
                            <img src="/storage/user/on-off1.png" width="15px">
                        @endif
                    </div>
                    <div class="">
                        {{ $post->user->name }}
                    </div>
                </div>
                <div class="col-md-1 text-right" id="{{$post->order}}">
                    #{{ $post->order }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-1">
                    @if ($post->user->avatar)
                        <img src="/storage/user/{{ $post->user->id . '/100_' . $post->user->avatar }}" class="mt-1">
                    @endif
                        {{$post->created_at}}
                </div>
                <div class="m-1 ml-3 col-md-11">
                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
            {{-- @dd($post->likes) --}}
            <div class="text-right">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                @if (Auth::user())
                    <strong id="nrLikes{{$post->id}}"> @if (count($post->likes) > 0) {{count($post->likes)}} @endif</strong>
                    @if (auth()->id() == $post->user->id)
                        <i class="fas fa-heart mr-2 mt-2" style="font-size:24px"></i>
                    @else
                        <i class="fas fa-heart mr-2 mt-2" data-id="{{$post->id}}" id="heart{{$post->id}}" @if ($post->isMyLike()) style="font-size:24px;color:red" @endif style="font-size:24px"></i>
                    @endif
                @else
                    <strong>@if (count($post->likes) > 0) {{count($post->likes)}} @endif</strong>
                    <i class="far fa-heart mr-2 mt-2" style="font-size:24px"></i>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @if (!$topic->closed && Auth::user())
    {{ Form::open(['action' => 'PostController@store', 'method' => 'POST']) }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="container mt-4 pb-3 bg-white shadow-sm">
            <div class="pt-2">
                Write a post
            </div>
            <div class="mt-2">
                {!! Form::textarea('body', 'Type here your content', ['id' => 'article-ckeditor', 'class' => 'form-control my-3 py-3']) !!}
            </div>
            <div class="my-3 text-right">
                <button class="btn btn-primary">Reply</button>
            </div>
        </div>
    {{ Form::close() }}
    @endif
@endsection

@section('js')
    <script>
        $('.fa-heart').click(function(e) {
            e.preventDefault();
            const postId = $(this).attr('data-id');
            const like = $('#nrLikes' + postId);
            const heart = $('#heart' + postId);
            $.ajax({
                url: '/post/like/' + postId,
                type: 'POST',
                success: function(msg) {
                    if (msg.success) {
                        like.text(Number(like.text()) + 1);
                        heart.css('color', 'red');
                        heart.addClass('fas fa-heart');
                    } else {
                        like.text(Number(like.text()) - 1);
                        if (like.text() == 0)
                            like.text(null);
                        heart.css('color', 'black');
                        heart.addClass('fas fa-heart');
                    }
                }
            });
        });
    </script>
@endsection
