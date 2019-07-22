@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <span>></span>
                <a href="/category/{{$section->category->id}}">{{ $section->category->title }}</a>
                <span>></span>
                <a>{{ $section->title }}</a>
            </div>
        </div>
        @if (Auth::user() && Auth::user()->hasPermission(14))
            <div class="col-md-8 mr-2" align='right'>
                <a href="" class="btn btn-warning m-1">New Section</a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
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
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </p>
                        </div>
{{--                    @endif--}}
                @endforeach
                <br><h6 class="border-bottom border-gray pb-2 mb-0">Topix</h6>
{{--            </div>--}}
{{--        @endforeach--}}
{{--        @if (count($section->topics->where('post_it', 1)->where('closed', 0)) > 0)--}}
{{--            <div class="my-3 p-3 bg-white rounded shadow-sm">--}}
{{--                <h6>Topics</h6>--}}
                @foreach($section->topics as $topic)
                    @if($topic->post_it && !$topic->closed)
                        <div class="media text-muted pt-3">
                            {{--                            <img src="{{$topic->}}" alt="" class="mr-2 rounded">--}}
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <a class="text-dark" style="text-decoration: none" href="/topic/{{$topic->id}}"><strong class="d-block text-gray-dark">{{$topic->title}}</strong></a>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
{{--        @endif--}}
            <div class="d-flex mt-3 pb-3">
                @if (Auth::user() && Auth::user()->hasPermission(13))
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="/section/{{ $section->id }}/edit">Edit</a>
                    </div>
                @endif
                @if (Auth::user() && Auth::user()->hasPermission(15))
                    <div class="col-md-6" align='right'>
                        <a class="btn btn-danger" href="">Delete</a>
                    </div>
                @endif

            </div>
    </div>
@endsection