@extends('layouts.app')

@section('content')
    <div class="container mt-4 bg-light rounded">
        <div class="container">
            {!! Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'PUT']) !!}
            <div class="form-group pt-3">
                <div class="dropdown show">
                    <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category and Sections
                    </a>
                    {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}
                    
                    <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink" style="max-height: 500; overflow: auto;">
                        @foreach ($categories as $category)
                            @if ($category->title == $section->category->title)
                                <a class="dropdown-item pl-3" href="javascript:void(0);">
                                    <div class="rounded mt-2 py-1 pl-1" onclick="myCall({{ $category->id }}, 'c')">{{ $category->title }}</div>
                                </a>
                            @else
                                <a class="dropdown-item pl-3" href="javascript:void(0);" onclick="myCall({{ $category->id }}, 'c')">{{ $category->title }}</a>
                            @endif
                            @if (count($category->sections) > 0)
                                @foreach ($category->sections as $this_section)
                                    @if ($this_section->id == $section->id)
                                        <a class="dropdown-item pl-4" href="javascript:void(0);">
                                            <div class="bg-success rounded py-1 pl-1" onclick="myCall({{ $this_section->id }}, 's')">{{ $this_section->title }}</div>
                                        </a>
                                    @else
                                    @if (count($this_section->children) > 0)
                                        @foreach ($this_section->children as $child)
                                            @if ($child->parent_id == $section->id)
                                                <a class="dropdown-item pl-5" href="javascript:void(0);">
                                                    <div class="bg-success rounded py-1 pl-1" onclick="myCall({{ $this_section->id }}, 's')">{{ $child->title }}</div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                        <a class="dropdown-item pl-4" href="javascript:void(0);" onclick="myCall({{ $this_section->id }}, 's')">{{ $this_section->title }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{Form::label('title', 'Title', ['class' => 'mt-2'])}}
            {{Form::text('title', $section->title, ['class' => 'form-control'])}}
        </div>
        <div class="py-3">
            <input type="hidden" name="category_id" value=1>
            <input type="hidden" name="parent_id" value="0">
            <div align='center'>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>    
        </div>
    </div>
@endsection
