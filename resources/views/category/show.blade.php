@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        @if (Auth::user())
            <div class="col-md-12 mr-2" align='right'>
                <a href="/category/create" class="btn btn-info m-1">New Category</a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
            <div class="d-flex">
                <div>
                    <img src="/{{$category->avatar}}" alt="" class="mr-2 rounded">
                </div>
                <div>
                    <h2>{{$category->title}}</h2>
                </div>
                @if ((Auth::user()) && (Auth::user()->hasPermission(13) || Auth::user()->hasPermission(15)))
                <div class="dropdown ml-3" style="font-size:24px">
                        <i class='fas fa-pencil-alt' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Auth::user()->hasPermission(13))
                                <a class="dropdown-item" href="/category/{{ $category->id }}/edit">Edit</a>
                            @endif
                            @if (Auth::user()->hasPermission(15))
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Delete</a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @foreach($category->sections->where('parent_id', null) as $section)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="/{{$section->avatar}}" alt="" class="mr-2 rounded">
                    </div>
                    <div>
                        @if(Auth::user() && Auth::user()->hasPermission(18))
                            <a class="card-link text-dark" href="/section/{{$section->id}}/edit"><h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6></a>
                        @else
                            <h6 class="border-bottom border-gray pb-2 mb-0">{{$section->title}}</h6>
                        @endif
                    </div>
                </div>
                @if (count($section) > 0)
                    @foreach($section->children as $child)
                        <div class="media text-muted pt-3">
                            <img src="/{{$child->avatar}}" alt="" class="mr-2 rounded">
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <a class="text-dark" style="text-decoration: none" href="/section/{{$child->id}}"><strong class="d-block text-gray-dark">{{$child->title}}</strong></a>
                            </p>
                        </div>
                    @endforeach
                @else
                    <div>No posts</div>
                @endif
            </div>
        @endforeach
    </div>
@endsection