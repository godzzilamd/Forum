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
                <div class="col-md-1 text-right">
                    #{{ $post->order }}
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-1">
                    <img src="/storage/user/{{ $post->user->avatar }}" width="80px" class="mt-1 ml-1">
                </div>
                <div class="m-1 col-md-11">
                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
            {!! Form::open(['action' => ['PostController@like', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="text-right">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <strong id="nrLikes{{$post->id}}">{{count($post->likes)}}</strong>
                    <button class="mr-2 mb-2 bg-transparent border-0"><i class="far fa-heart" data-id="{{$post->id}}" id="heart{{$post->id}}" style="font-size:24px"></i></button>
                </div>
            {!! Form::close() !!}
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
{{-- 
@section('js')
<script>
        $('.fa-heart').click(function(e) {
            e.preventDefault();
            const postId = $(this).attr('data-id');
            const like = $('#nrLikes'+postId);
            $.ajax({
                url: '/post/like/' + postId,
                type: 'POST',
                success: function(msg) {
                    if (msg.success) {
                        like.text(Number(like.text()) + 1); 
                    }
                }               
            });
});
    </script>
@endsection --}}