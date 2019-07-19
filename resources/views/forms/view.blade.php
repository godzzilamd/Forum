@extends('layouts.app')

@section('subheader')
<div class="d-flex" style="background-color:#33334d">
        <div class="col-md-12 mr-2" align='right'>
            <a href="category/create" class="btn btn-warning mr-1">New Category</a>
            <a hef="" class="btn btn-warning" >New Section</a>
        </div>
    </div>
@endsection

@section('content')
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