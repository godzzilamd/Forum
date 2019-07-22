@extends('layouts.app')

@section('subheader')
<div class="d-flex" style="background-color:#99ffff">
        <div class="col-md-12 mr-2" align='right'>
            <a href="category/create" class="btn btn-warning m-1">New Category</a>
            <a hef="" class="btn btn-warning m-1" >New Section</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="{{$category->avatar}}" alt="" class="mr-2 rounded">
                    </div>
                    <div>
                        <a class="card-link text-dark" href="/category/{{$category->id}}/edit"><h6 class="border-bottom border-gray pb-2 mb-0">{{$category->title}}</h6></a>
                    </div>
                </div>
                @foreach($category->sections as $section)
                    @if(!$section->parent_id)
                        <div class="media text-muted pt-3">
                            <img src="{{$section->avatar}}" alt="" class="mr-2 rounded">
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <a class="text-dark" style="text-decoration: none" href="/section/{{$section->id}}"><strong class="d-block text-gray-dark">{{$section->title}}</strong></a>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
@endsection