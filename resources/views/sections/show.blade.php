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
        <div class="col-md-8 mr-2" align='right'>
            @if (Auth::user())
                    <a href="/section/create" class="btn btn-info m-1">New Section</a>
                    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">
                    <button href="/topic/create" class="btn btn-info m-1">New Topic</button>
            @endif
            {{$rows->links()}}
         </div>
    </div>
{{ Form::close() }}
@endsection

@section('content')
    <div class="container bg-white">
        <div class="d-flex pt-2">
            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
                <div class="dropdown ml-3" style="font-size:24px">
                    <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (Auth::user()->hasPermission(13))
                            <a class="dropdown-item" href="/section/{{ $section->id }}/edit">Edit</a>
                        @endif
                        {{ Form::open(['action' => ['SectionController@destroy', $section->id], 'method' => 'delete']) }}
                            @if (Auth::user()->hasPermission(15))
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" href="/section/{{ $section->id }}">Delete</button>
                            @endif
                        {{ Form::close() }}
                    </div>
                </div>
            @endif
        </div>
        <div>
            @foreach($data['sections'] as $section)
                <div class="my-2 ml-5 border-roundest p-4">
                    <a class="text-dark" style="text-decoration: none;font-size:20px" href="/section/{{$section->id}}">
                        <img src="/{{$section->avatar}}">
                        <strong>{{$section->title}}</strong>
                        @if($section->topics())
                            <div class="float-right">{{$section->topics()->latest()->first()->posts()->latest()->first()->user()->first()->name}}</div>
                            <div class="float-right">{{$section->topics()->latest()->first()->posts()->latest()->first()->update_at}}, </div>
                            <div class="float-right">{{$section->topics()->latest()->first()->title}}</div>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
        <hr class="shadow">
        <div class="pb-3">
            @foreach($data['topics'] as $topic)
                <div class="my-2 ml-5 border-roundest p-4">
                    <a class="text-dark" style="text-decoration: none;font-size:15px" href="/topic/{{$topic->id}}">
                        <strong>{{$topic->title}}</strong>
                    </a>
                </div>
            @endforeach
        </div>
{{--        {{$rows->links()}}--}}
    </div>

    <style>
        .border-roundest {
            border-style: double;
            border-color: dodgerblue;
            border-radius: 20px;
        }
    </style>
@endsection