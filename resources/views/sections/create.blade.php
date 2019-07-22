@extends('layouts.app')

@section('content')
<div class="container bg-white shadow-sm">
    @csrf
    <div class="dropdown show">
            {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}<br>
            <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category and Sections
            </a>
    <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink" style="max-height: 500; overflow: auto;">
        @foreach ($categories as $category)
                <a class="dropdown-item pl-3" href="javascript:void(0);" onclick="myCall({{ $category->id }}, 'c')">{{ $category->title }}</a>
            @if (count($category->sections) > 0)
                @foreach ($category->sections as $this_section)
                    @if (count($this_section->children) > 0)
                        @foreach ($this_section->children as $child)
                                <a class="dropdown-item pl-5" href="javascript:void(0);">
                                    <div class="bg-success rounded py-1 pl-1" onclick="myCall({{ $this_section->id }}, 's')">{{ $child->title }}</div>
                                </a>
                        @endforeach
                    @else
                        <a class="dropdown-item pl-4" href="javascript:void(0);" onclick="myCall({{ $this_section->id }}, 's')">{{ $this_section->title }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
    {!! Form::open(['action' => 'SectionController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group mt-3">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', 'Title', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            <input type="hidden" name="category_id" value="1">
        </div>
    <div class="d-flex mt-3 pb-3 justify-content-center">
        <div>
            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection