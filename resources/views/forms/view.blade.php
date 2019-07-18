@extends('layouts.app')

@section('content')
    <?php
        $colors = array('bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-secondary', 'bg-dark')
    ?>
    <div class="container">
        @foreach($categories as $category)
            <div class="card mt-3 {{$colors[$category->id%7]}}">
                <a class="card-link text-dark" href="/category"><h5 class="card-header">{{$category->title}}</h5></a>
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