@extends('layouts.app')

@section('content')
    <div class="container mt-4 bg-light rounded">
        <div class="container">
            {!! Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group pt-3">
                <div class="dropdown show">
                    <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category and Sections
                    </a>
                    {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}
                    {{-- <select class="custom-select" tabindex="">
                        @foreach ($categories as $category)
                            {{-- @if ($category->title == $section->category->title)
                                <option class="dropdown-item"><b>{{ $category->title }}</b></option>    
                                {{-- <optgroup class="dropdown-item"> --}}
                            {{-- @else --}} 
                                {{-- <option><b>{{ $category->title }}</b></option>    
                                {{-- <optgroup class="py-0 my-0"> --}}
                            {{-- @endif --}}
                            {{-- @if (count($category->sections) > 0)
                                @foreach ($category->sections as $this_section)
                                    @if ($this_section->id == $section->id)
                                        <option class="custom-space" selected><pre>       {{ $this_section->title }}</pre></option>
                                    @else
                                        <option class="custom-space"><pre>       {{ $this_section->title }}</pre></option>
                                    @endif
                                @endforeach
                            {{-- </optgroup> --}}
                            {{-- @endif
                        @endforeach
                    </select> --}}
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
            <input type="TextBox" ID="datebox" Class="form-control">
            <div class="input-group-btn">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul id="demolist" class="dropdown-menu">
                        <li value="here" onclick="myCall(1,2)"><a href="#">A</a></li>
                        <li><a href="#" onclick="myCall()">B</a></li>
                        <li><a href="#" onclick="myCall()">C</a></li>
                    </ul>
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

@section('js')
<script>
function myCall(a1,a2) {
    console.log(a1, a2);
    console.log(document.getElementById('datebox').value = a1 . a2);
}
</script>
@endsection