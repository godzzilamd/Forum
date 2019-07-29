@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        @if (Auth::user())
            <div class="col-md-12 mr-2" align='right'>
                @if (Auth::user()->hasPermission(14))
                    {{ Form::open(['action' => 'SectionController@create', 'method' => 'GET']) }}
                        <input type="hidden" name="sectionName" value="{{$category->title}}">
                        <button href="/section/create" class="btn btn-info m-1">New Section</button>
                    {{ Form::close() }}
                @endif
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
            <div class="d-flex">
                <div>
                    <img src="/{{$category->avatar}}" alt="" width="40px" height="40px" class="mr-2 rounded">
                </div>
                <div>
                    <h2>{{$category->title}}</h2>
                </div>
                @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
                <div class="dropdown ml-3" style="font-size:24px">
                        <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Auth::user()->hasPermission(13))
                                <a class="dropdown-item" href="/category/{{ $category->id }}/edit">{{__('Edit')}}</a>
                            @endif
                            {{ Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'delete']) }}
                                @if (Auth::user()->hasPermission(15))
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item" href="/category/{{ $category->id }}">{{__('Delete')}}</button>
                                @endif
                            {{ Form::close() }}
                        </div>
                    </div>
                @endif
            </div>
        @foreach($category->sections->where('parent_id', null) as $section)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="/{{$section->avatar}}" alt="" width="20px" height="20px" class="mr-2 rounded">
                    </div>
                    <div>
                        @if(Auth::user() && Auth::user()->hasPermission(18))
                            <a class="card-link text-dark" href="/section/{{$section->id}}"><h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6></a>
                        @else
                            <h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6>
                        @endif
                    </div>
                </div>
                @foreach($section->children as $child)
                    <div class="media text-muted pt-3 my-2 ml-5 border-roundest p-4">
                        <img src="/{{$child->avatar}}">
                        <a class="text-dark" style="text-decoration: none" href="/section/{{$child->id}}"><strong>{{$child->title}}</strong></a>
                        @if($child->topics()->count())
                            @php
                                $topic = $child->lastPost();
                                $post = $topic->posts()->latest()->first();
                                $NumberOfPosts = count($topic->posts);
                            @endphp
                            <div class="float-right"><a style="text-decoration: none" class="text-dark" href="/topic/{{$topic->id}}?page={{floor(($NumberOfPosts-1)/20)+1}}#{{$NumberOfPosts}}"><h1>{{$NumberOfPosts}}</h1></a></div>
                            <div class="float-right">{{$post->user->name}}</div>
                            <div class="float-right">
                                @if($post->user->online)
                                    <img src="/storage/user/on-off2.png">
                                @else
                                    <img src="/storage/user/on-off1.png">
                                @endif
                            </div>
                            <div class="float-right">{{$post->updated_at}},</div>
                            <div class="float-right pr-3"><h2>{{$topic->title}}</h2></div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
