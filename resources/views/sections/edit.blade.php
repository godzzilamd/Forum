@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow-sm">
        {{ Form::open(['action' => ['SectionController@update', $section], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id'=>'formContent']) }}
        <div class="dropdown show">
            {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}<br>
            <a class="dropdown-toggle mt-3 btn btn-outline-primary" href="#" role="button"
               id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if($section->parent_id)
                    {{$section->parent->title}}
                @else
                    {{$section->category->title}}
                @endif
            </a>
            <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink"
                 style="max-height: 500px; overflow: auto;">
                @foreach ($categories as $category)
                    <a class="dropdown-item pl-1" href="javascript:void(0);" data-id="{{$category->id}}" data-type='c'>
                        @if($section->category_id == $category->id)
                            <div class="bg-success rounded py-1 pl-1">{{ $category->title }}</div>
                        @else
                            {{ $category->title }}
                        @endif
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
                {{Form::text('title', $section->title, ['class' => 'form-control'])}}
                <input type="hidden" id="category_id" name="category_id" value="{{$section->category_id}}">
                <input type="hidden" id="type" name="type" value="{{$section->parent_id ? 's' : 'c'}}">
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