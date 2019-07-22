@extends('layouts.app')
@if (auth()->user()->hasPermission('view-create-buttons'))
    @section('subheader')
    <div class="d-flex bg-white shadow-sm flex-row-reverse" style="background-color:#33334d">
        <div class="mr-2">
            <a href="#" class="btn btn-warning m-1">New Category</a>
            <a href="/topic/create" class="btn btn-warning m-1" >New Topic</a>
        </div>
    </div>
    @endsection    
@endif

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
        </div>
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
        </div>
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
        </div>
    </div>
</div>
    <div class="container">
        @foreach($categories as $category)
            <div class="card mt-3">
                <div class="d-flex">
                    <div class="mt-2 ml-2">
                        <img src="{{$category->avatar}}" width="30" height="30"/>
                    </div>
                    <div>
                        <a class="card-link text-dark" href="/category/{{$category->id}}/edit"><h5 class="card-header">{{$category->title}}</h5></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($category->sections as $section)
                                @if(!$section->parent_id)
                                    <tr>
                                        <td><a class="card-link text-dark" href="/section/{{$section->id}}">{{$section->title}}</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection