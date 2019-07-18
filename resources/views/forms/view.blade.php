@extends('layouts.app')

@section('subheader')
    <div class="mt-1">
        <div class="float-left">
            <div class="ml-3 text-light">
                Calea
            </div>
        </div>
        <div class="float-right mr-2">
            <a href="" class="btn btn-warning mr-1">New Category</a>
            <a hef="" class="btn btn-warning" >New Section</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="card mt-3 bg-light">
                <a class="card-link" href="/category" class="text-light"><h5 class="card-header" >{{$category->title}}</h5></a>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($category->sections as $section)
                                @if(!$section->parent_id)
                                    <tr>
                                        <td>{{$section->title}}</td>
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