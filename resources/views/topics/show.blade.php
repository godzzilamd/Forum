@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/forums">{{ $topic->section->category->title }}</a>
                <i class='fas fa-angle-double-right'></i>
                <a href="/section/{{ $topic->section->id }}">{{ $topic->section->title }}</a>
                <i class='fas fa-angle-double-right'></i>
                <a>{{ $topic->title }}</a>
            </div>
        </div>
        @if (Auth::user())
            <div class="col-md-8 mr-2" align='right'>
                Paginare
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container bg-white rounded shadow-sm pb-2">
        <div class="d-flex mb-3 pt-2">
            <div class="mt-2 mr-2">
                <i class="fas fa-lock"></i>
            </div>
            <div class="mt-2 mr-2">
                <i class="fas fa-thumbtack"></i>
            </div>
            <div>
                <h2>{{$topic->title}}</h2>
            </div>
            @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
            <div class="dropdown ml-3" style="font-size:24px">
                <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (Auth::user()->hasPermission(13))
                        <a class="dropdown-item" href="/section/{{ $topic->id }}/edit">Edit</a>
                    @endif
                    @if (Auth::user()->hasPermission(15))
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Delete</a>
                    @endif
                </div>
            </div>
            @endif
        </div>
        @php
            $i = 1;
        @endphp
        @foreach($topic->posts as $post)
        <div class="rounded p-1 mb-5" style="background-color:#ccffff">
            <div class="d-flex">
                <div class="d-flex col-md-11">
                    <div class="mx-1">
                        @if ($post->user->isOnline())
                            <img src="/storage/user/on-off2.png" width="15px">
                        @else
                            <img src="/storage/user/on-off1.png" width="15px">
                        @endif
                    </div>
                    <div class="">
                        {{ $post->user->name }}
                    </div>
                </div>
                <div class="col-md-1 text-right">
                    #{{ $i++ }}
                </div>
            </div>
            <div class="m-1">
                <p>
                    {!! $post->body !!}
                </p>
            </div>
            <div class="text-right">
                <i class="far fa-heart mr-2 mb-2" id="heart{{$post->id}}" onclick="switch_heart({{$post->id}})" style="font-size:24px"></i>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container mt-4 pb-3 bg-white shadow-sm">
        <div class="pt-2">
            Write a post
        </div>
        <div class="mt-2">
            {!! Form::textarea('body', 'Type here your content', ['id' => 'article-ckeditor', 'class' => 'form-control my-3 py-3']) !!}
        </div>
        <div class="my-3 text-right">
            <button class="btn btn-primary">Reply</button>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function switch_heart($id) {
            if (document.getElementById("heart" + $id).className == "fas fa-heart mr-2 mb-2") {

                document.getElementById("heart" + $id).className = "far fa-heart mr-2 mb-2";
                document.getElementById("heart" + $id).style = "font-size:24px;color:black";

            } else {

               document.getElementById("heart" + $id).className = "fas fa-heart mr-2 mb-2";
               document.getElementById("heart" + $id).style = "font-size:24px;color:red";
               

            }
            console.log(document.getElementById("heart" + $id).className == "fas fa-heart mr-2 mb-2");
        }

        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection