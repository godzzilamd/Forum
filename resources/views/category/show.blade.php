@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$category->title}}</h2>
        @foreach($category->sections->where('parent_id', null) as $section)
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
                    <div class="media text-muted pt-3">
                        {{--                            <img src="{{$topic->}}" alt="" class="mr-2 rounded">--}}
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <a class="text-dark" style="text-decoration: none" href="/section/{{$child->id}}"><strong class="d-block text-gray-dark">{{$child->title}}</strong></a>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="d-flex mt-3 pb-3">
            @if (Auth::user() && Auth::user()->hasPermission(8))
                <div class="col-md-6">
                    <a class="btn btn-primary" href="/category/{{ $category->id }}/edit">Edit</a>
                </div>
            @endif
            @if (Auth::user() && Auth::user()->hasPermission(10))
                <div class="col-md-6" align='right'>
                    <a class="btn btn-danger" href="">Delete</a>
                </div>
            @endif

        </div>
    </div>
@endsection