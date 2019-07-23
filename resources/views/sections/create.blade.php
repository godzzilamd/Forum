@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow-sm">
        {{ Form::open(['action' => 'SectionController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'formContent']) }}
        <div class="dropdown show">
            {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}<br>
            <a class="dropdown-toggle mt-3 btn btn-outline-primary" href="#" role="button"
               id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
            </a>
            <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink"
                 style="max-height: 500px; overflow: auto;">
                @foreach ($categories as $category)
                    <a class="dropdown-item pl-1" href="javascript:void(0);" data-id="{{$category->id}}" data-type='c'>
                        {{ $category->title }}
                    </a>
                    @if (count($category->sections) > 0)
                        @foreach ($category->sections as $this_section)
                            <a class="dropdown-item {{$this_section->parent_id ? 'pl-5' : 'pl-4'}}" href="javascript:void(0);" data-id="{{$this_section->id}}"
                               data-type='s'>{{ $this_section->title }}</a>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="form-group mt-3">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                <input type="hidden" id="category_id" name="category_id" value="">
                <input type="hidden" id="type" name="type" value="">
                @csrf
            </div>
            <label class="control-label" for="name">Incarca o imagine</label>
            <input id="file-5" name="photo" class="file" type="file" multiple>
            <div class="d-flex mt-3 pb-3 justify-content-center">
                <div>
                    {{Form::submit(__('Edit'), ['class'=>'btn btn-primary'])}}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('js')
    <script>
        $(".dropdown-menu a").click(function () {
            var selText = $(this).text();
            $('#category_id').val($(this).attr('data-id'));
            $('#type').val($(this).attr('data-type'));
            $(this).parents('.dropdown').find('#dropdownMenuLink2').text(selText);
        });
    </script>
@endsection


























{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container bg-white shadow-sm">--}}
{{--    @csrf--}}
{{--    <div class="dropdown show">--}}
{{--            {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}<br>--}}
{{--            <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                Category and Sections--}}
{{--            </a>--}}
{{--    <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink" style="max-height: 500px; overflow: auto;">--}}
{{--        @foreach ($categories as $category)--}}
{{--                <a class="dropdown-item pl-3" href="javascript:void(0);" data-id="{{$child->id}}" data-type='s'>{{ $category->title }}</a>--}}
{{--            @if (count($category->sections) > 0)--}}
{{--                @foreach ($category->sections as $this_section)--}}
{{--                    @if (count($this_section->children) > 0)--}}
{{--                        @foreach ($this_section->children as $child)--}}
{{--                                <a class="dropdown-item pl-5" href="javascript:void(0);" data-id="{{$child->id}}" data-type='s'>--}}
{{--                                    <div class="bg-success rounded py-1 pl-1">{{ $child->title }}</div>--}}
{{--                                </a>--}}
{{--                        @endforeach--}}
{{--                    @else--}}
{{--                        <a class="dropdown-item pl-4" href="javascript:void(0);" data-id="{{$child->id}}" data-type='s'>{{ $this_section->title }}</a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--    {!! Form::open(['action' => 'SectionController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
{{--        <div class="form-group mt-3">--}}
{{--            {{Form::label('title', 'Title')}}--}}
{{--            {{Form::text('title', 'Title', ['class' => 'form-control', 'placeholder' => 'Name'])}}--}}
{{--            <input type="hidden" name="category_id" value="1">--}}
{{--        </div>--}}
{{--    <div class="d-flex mt-3 pb-3 justify-content-center">--}}
{{--        <div>--}}
{{--            {{Form::submit('Create', ['class'=>'btn btn-primary'])}}--}}
{{--            {!! Form::close() !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@section('js')--}}
{{--    <script>--}}
{{--        $(".dropdown-menu a").click(function(){--}}
{{--            var selText = $(this).text();--}}
{{--            $('#category_id').val($(this).attr('data-id'));--}}
{{--            $('#type').val($(this).attr('data-type'));--}}
{{--            $(this).parents('.dropdown').find('#dropdownMenuLink1').text(selText);--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}