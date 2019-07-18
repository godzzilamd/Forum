@extends('layouts.app')

@section('subheader')
    <div class="mt-1">
        <div class="float-left">
            <div class="ml-3 text-light">
                Calea
            </div>
        </div>
        <div class="float-right mr-2">
            <a href="/caregory/create" class="btn btn-dark mr-1">New Category</a>
            <a href="" class="btn btn-dark text-light">New Section</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="card mt-3">
                <a class="card-link text-dark" href="/category/{{$category->id}}/edit"><h5 class="card-header">{{$category->title}}</h5></a>
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