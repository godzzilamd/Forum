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
                <a href="/section/create" class="btn btn-info m-1">New Section</a>
                <a href="/topic/create" class="btn btn-info m-1">New Topic</a>
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
                    <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
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
        @foreach($data->where('is_section', true) as $date)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <a class="text-dark" style="text-decoration: none" href="/section/{{$date->id}}"><strong class="d-block text-gray-dark">{{$date->title}}</strong></a>
                </p>
            </div>
            </div>
        @endforeach
        <h6 class="border-bottom border-gray pb-2 mb-0 mt-4">Topics</h6>
        @foreach($data->where('is_section', false) as $date)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <a class="text-dark" style="text-decoration: none" href="/topic/{{$date->id}}"><strong class="d-block text-gray-dark">{{$date->title}}</strong></a>
                    </p>
                </div>
            </div>
        @endforeach
        {{$data->links()}}
    </div>
@endsection