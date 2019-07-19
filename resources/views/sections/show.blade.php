@extends('layouts.app')

@section('subheader')
    <div class="d-flex" style="background-color:#33334d">
        <div class="col-md-4">
            <div class="ml-3 text-light mt-1">
                <a>{{ $section->category->title }}</a>
                <span>></span>
                <span>{{ $section->title }}</span>
            </div>
        </div>
        <div class="col-md-8 mr-2" align='right'>
            <a href="" class="btn btn-warning mr-1">New Category</a>
            <a hef="" class="btn btn-warning" >New Section</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <div>
            @if (count($section->children) > 0)
                <div class="text-light">Subsections</div>
                @foreach ($section->children as $child)
                    <div class="bg-light rounded mx-2 my-2 px-2 py-1">
                        <div>{{ $child->title }}</div>
                    </div>
                @endforeach
            @endif
            @if (count($section->topics) > 0)
                <div class="text-light">Topics</div>
                @foreach($section->topics as $topic)
                    <div class="bg-light rounded ml-5 mr-2 my-2 px-2 py-1">
                        {{ $topic->title }}
                    </div>
                @endforeach
            @else
                <div class="text-light">No topics found</div>
            @endif
        </div>
        <div class="d-flex mt-3">
            <div class="col-md-6">
            <a class="btn btn-primary" href="/section/{{ $section->id }}/edit">Edit</a>
            </div>
            <div class="col-md-6" align='right'>
                <a class="btn btn-danger" href="">Delete</a>
            </div>    
        </div>
    </div>
@endsection