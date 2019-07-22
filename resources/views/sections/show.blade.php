@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <span>></span>
                <a href="">{{ $section->category->title }}</a>
                <span>></span>
                <a>{{ $section->title }}</a>
            </div>
        </div>
        <div class="col-md-8 mr-2" align='right'>
            <a href="" class="btn btn-warning m-1">New Section</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <h2>{{$section->title}}</h2>
        @foreach($section->children as $child)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="{{$child->avatar}}" alt="" class="mr-2 rounded">
                    </div>
                    <div>
                        <a class="card-link text-dark" href="/section/{{$child->id}}/edit"><h6 class="border-bottom border-gray pb-2 mb-0">{{$child->title}}</h6></a>
                    </div>
                </div>
                @foreach($child->topics as $topic)
                    @if($topic->post_it)
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
        @endforeach
    </div>
@endsection