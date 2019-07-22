@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/forums">{{ $section->category->title }}</a>
                <i class='fas fa-angle-double-right'></i>
                <a>{{ $section->title }}</a>
            </div>
        </div>
        @if (Auth::user())
            <div class="col-md-8 mr-2" align='right'>
                <a href="/section/create" class="btn btn-warning m-1">New Section</a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex">
            <div>
                <img src="{{$section->avatar}}" alt="" class="mr-2 rounded">
            </div>
            <div>
                <h2>{{$section->title}}</h2>
            </div>
            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
            <div class="dropdown ml-3" style="font-size:24px">
                    <i class='fas fa-chevron-circle-down' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (Auth::user()->hasPermission(13))
                            <a class="dropdown-item" href="/section/{{ $section->id }}/edit">Edit</a>
                        @endif
                        @if (Auth::user()->hasPermission(15))
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Delete</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
{{--        @foreach($section->children as $child)--}}
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="{{$section->avatar}}" alt="" class="mr-2 rounded">
                    </div>
                    <div>
                        @if(Auth::user() && Auth::user()->hasPermission(18))
                            <a class="card-link text-dark" href="/section/{{$section->id}}/edit"><h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6></a>
                        @else
                            <h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6>
                        @endif
                    </div>
                </div>
                @foreach($section->children as $child)
{{--                    @if($topic->post_it)--}}
                        <div class="media text-muted pt-3">
{{--                            <img src="{{$topic->}}" alt="" class="mr-2 rounded">--}}
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <a class="text-dark" style="text-decoration: none" href="/section/{{$child->id}}"><strong class="d-block text-gray-dark">{{$child->title}}</strong></a>
                            </p>
                        </div>
{{--                    @endif--}}
                @endforeach
                <br><h6 class="border-bottom border-gray pb-2 mb-0">Topics</h6>
                @foreach($section->topics as $topic)
                    @if($topic->post_it && !$topic->closed)
                        <div class="media text-muted pt-3">
                            {{--                            <img src="{{$topic->}}" alt="" class="mr-2 rounded">--}}
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <a class="text-dark" style="text-decoration: none" href="/topic/{{$topic->id}}"><strong class="d-block text-gray-dark">{{$topic->title}}</strong></a>
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
    </div>
@endsection