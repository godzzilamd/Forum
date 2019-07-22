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
            <div class="col-md-8 mr-2" align='right'>
                <a href="/topic/create" class="btn btn-info m-1">New Topic</a>
                <a href="" class="btn btn-info m-1">New Post</a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex">
            <div>
                <h2>{{$topic->title}}</h2>
            </div>
            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
            <div class="dropdown ml-3" style="font-size:24px">
                    <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (Auth::user()->hasPermission(13))
                            <a class="dropdown-item" href="/section/{{ $topic->id }}/edit">Edit</a>
                        @endif
                        @if (Auth::user()->hasPermission(15))
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Delete</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        @foreach($topic->posts as $post)
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <a class="text-dark" style="text-decoration: none" href="/topic/{{$post->id}}"><strong class="d-block text-gray-dark">{{$post->title}}</strong></a>
                </p>
            </div>
        @endforeach
    </div>
@endsection