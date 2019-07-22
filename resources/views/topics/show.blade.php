@extends('layouts.app')

@section('subheader')
    <div class="d-flex" style="background-color:#33334d">
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