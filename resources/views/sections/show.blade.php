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
    <div class="container mt-4 pt-3 bg-white rounded shadow-sm">
        <div>
            @if (count($section->children) > 0)
                <div>Subsections</div>
                @foreach ($section->children as $child)
                    <div class="bg-secondary rounded m-2 p-2 text-light">
                        <div>{{ $child->title }}</div>
                    </div>
                @endforeach
            @endif
            @if (count($section->topics) > 0)
                <div>Topics</div>
                @foreach($section->topics as $topic)
                    <div class="bg-secondary rounded ml-5 m-2 p-2">
                        <a class="card-link text-light" href="/topic/{{$topic->id}}">{{ $topic->title }}</a>
                    </div>
                @endforeach
            @else
                <div>No topics found</div>
            @endif
        </div>
        <div class="d-flex mt-3 pb-3">
            <div class="col-md-6">
            <a class="btn btn-primary" href="/section/{{ $section->id }}/edit">Edit</a>
            </div>
            <div class="col-md-6" align='right'>
                <a class="btn btn-danger" href="">Delete</a>
            </div>    
        </div>
    </div>
@endsection