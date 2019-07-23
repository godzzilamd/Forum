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
        @if (Auth::user())
            <div class="col-md-8 mr-2" align='right'>
                <a href="/section/create" class="btn btn-info m-1">New Section</a>
                <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                <button href="/topic/create" class="btn btn-info m-1">New Topic</button>
            </div>
        @endif
    </div>
{{ Form::close() }}
@endsection

@section('content')
    <div class="container bg-white">
        <div class="d-flex pt-2">
            <div>
                <img src="/{{$section->avatar}}" alt="" class="mr-2 rounded">
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
        <div>
            @foreach($data->where('is_section', true) as $date)
                <div class="my-2 ml-5">
                    <a class="text-dark" style="text-decoration: none;font-size:20px" href="/section/{{$date->id}}">
                        <strong>{{$date->title}}</strong>
                    </a>
                </div>
            @endforeach
        </div>
        <hr class="shadow">
        <div class="pb-3">
            @if (count($data->where('is_section', false)) > 0)
                @foreach($data->where('is_section', false) as $date)
                    <div class="my-2 ml-5">
                        <a class="text-dark" style="text-decoration: none;font-size:15px" href="/topic/{{$date->id}}">
                            <strong>{{$date->title}}</strong>
                        </a>
                    </div>
                @endforeach
            @else
                <div>No posts</div>
            @endif
        </div>
        {{$data->links()}}
    </div>
@endsection