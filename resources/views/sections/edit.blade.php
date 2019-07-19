@extends('layouts.app')

@section('content')
    <div class="container mt-4 bg-light rounded">
        <div class="container">
            {!! Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group pt-3">
                {{-- <div class="dropdown show">
                    <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category and Sections
                    </a> --}}
                    {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}
                    <select class="custom-select">
                        @foreach ($categories as $category)
                            {{-- @if ($category->title == $section->category->title)
                                <option class="dropdown-item"><b>{{ $category->title }}</b></option>    
                                <optgroup class="dropdown-item">
                            @else --}}
                                <option><b>{{ $category->title }}</b></option>    
                                {{-- <optgroup class="py-0 my-0"> --}}
                            {{-- @endif --}}
                            @if (count($category->sections) > 0)
                                @foreach ($category->sections as $this_section)
                                    @if ($this_section->id == $section->id)
                                        <option class="mx-5 px-5" selected>{{ $this_section->title }}</option>
                                    @else
                                        <option class="mx-5 px-5">{{ $this_section->title }}</option>
                                    @endif
                                @endforeach
                            {{-- </optgroup> --}}
                            @endif
                        @endforeach
                    </select>
                    {{-- <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink" style="max-height: 500; overflow: auto;">
                        @foreach ($categories as $category)
                            @if ($category->title == $section->category->title)
                                <a class="dropdown-item pl-3" href="javascript:void(0);">
                                    <div class="bg-success rounded mt-2 py-1 pl-1">{{ $category->title }}</div>
                                </a>
                            @else
                                <a class="dropdown-item pl-3" href="javascript:void(0);">{{ $category->title }}</a>
                            @endif
                            @if (count($category->sections) > 0)
                                @foreach ($category->sections as $this_section)
                                    @if ($this_section->id == $section->id)
                                        <a class="dropdown-item pl-4" href="javascript:void(0);">
                                            <div class="bg-success rounded py-1 pl-1">{{ $this_section->title }}</div>
                                        </a>
                                    @else
                                    @if (count($this_section->children) > 0)
                                        @foreach ($this_section->children as $child)
                                            @if ($child->parent_id == $section->id)
                                                <a class="dropdown-item pl-5" href="javascript:void(0);">
                                                    <div class="bg-success rounded py-1 pl-1">{{ $child->title }}</div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                        <a class="dropdown-item pl-4" href="javascript:void(0);">{{ $this_section->title }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div> --}}
                {{-- </div> --}}
            </div>
            {{Form::label('title', 'Title', ['class' => 'mt-2'])}}
            {{Form::text('title', $section->title, ['class' => 'form-control'])}}
        </div>
        <div class="py-3">
            <div align='center'>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>    
        </div>
    </div>
@endsection