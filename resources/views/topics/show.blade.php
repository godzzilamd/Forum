@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <span>></span>
                <a href="/category/{{$topic->section->category->id}}">{{ $topic->section->category->title }}</a>
                <span>></span>
                <a href="/section/{{ $topic->section->id }}">{{ $topic->section->title }}</a>
                <span>></span>
                <a>{{ $topic->title }}</a>
            </div>
        </div>
        <div class="col-md-12 mr-2" align='right'>
            <a href="" class="btn btn-warning mr-1">New Category</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card mt-3">
            <a class="card-link text-dark" href="/topic/{{$topic->id}}/edit"><h5 class="card-header">{{$topic->title}}</h5></a>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                    @foreach($topic->posts as $post)
                        <tr>
                            <td>{{$post->body}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection