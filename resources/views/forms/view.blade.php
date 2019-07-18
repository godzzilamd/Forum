@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="card mt-3">
                <h5 class="card-header">{{$category->title}}</h5>
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