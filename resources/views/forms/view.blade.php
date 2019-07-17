@extends('layouts.app')

@section('content')
{{--@dd($categories)--}}
{{--    <div class="border border-dark m-4">--}}
        @foreach($categories as $category)
{{--            @dd($category->sections)--}}
                <div class="panel panel-primary">
                    <div class="panel-heading">{{$category->title}}</div>
                    <div class="panel-body">
                    @foreach($category->sections as $section)
                        <div>
                            {{$section->title}}
{{--                        </div>--}}
                    @endforeach
                    </div>
                </div>
        @endforeach
{{--        <div class="border border-dark mx-4 mt-3">--}}
{{--            <h5 class="m-2">Nume categorie</h5>--}}
{{--            <div class="border border-dark m-2">--}}
{{--                Nume Sectioune   gasdgasg--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
{{-- panel, table --}}