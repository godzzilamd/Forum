@extends('layouts.app')

@section('subheader')
        <div class="d-flex bg-white shadow-sm flex-row-reverse" style="background-color:#33334d">
            <div class="mr-2">
                @if (Auth::user())
                    @if (Auth::user()->hasPermission(9))
                        <a href="/category/create" class="btn btn-info m-1">{{__('messages.New category')}}</a>
                    @endif
                    @if (Auth::user()->hasPermission(14))
                        <a href="/section/create" class="btn btn-info m-1">{{__('messages.New section')}}n</a>
                    @endif
                @endif
            </div>
        </div>
@endsection

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <div class="d-flex">
                    <div>
                        <img src="{{$category->avatar}}" alt="" width="20px" height="20px" class="mr-2 rounded mb-2">
                    </div>
                    <div>
                        <a class="card-link text-dark" href="/category/{{$category->id}}"><h6 class="border-bottom border-gray pb-1 mb-0">{{$category->title}}</h6></a>
                    </div>
                </div>
                {{-- @dd($category) --}}
                {{-- @include('sections._partials.section_list', ['sections' => $category->parents, 'hasSection' => false]) --}}
                @include('sections._partials.section_list', ['sections' => $category->parents, 'hasSection' => false])
            </div>
        @endforeach
    </div>
@endsection
