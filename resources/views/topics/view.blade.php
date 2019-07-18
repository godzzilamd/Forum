@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection