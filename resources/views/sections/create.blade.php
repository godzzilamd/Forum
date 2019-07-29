@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow-sm">
        {{ Form::open(['action' => 'SectionController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id'=>'formContent']) }}
        <div class="dropdown show">
            {{Form::label('title', 'Section position', ['class' => 'mt-2'])}}<br>
            <a class="dropdown-toggle mt-3 btn btn-outline-primary" href="#" role="button"
               id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$parentName}}
            </a>
            <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink"
                 style="max-height: 500px; overflow: auto;">
                @foreach ($categories as $category)
                {{-- @dd($category->sections) --}}
                    <a class="dropdown-item pl-1" href="javascript:void(0);" data-id="{{$category->id}}" data-type='c'>
                        <img src="/{{$category->avatar}}" style="height: 20px; width: 20px;">{{ $category->title }}
                    </a>
                    {{-- @php s = '';  @endphp --}}
                        @if (count($category->parents) > 0)
                            @foreach ($category->parents as $this_section)
                                <a class="dropdown-item" href="javascript:void(0);" data-id="{{$this_section->id}}"
                                data-type='s'>&nbsp;&nbsp;<img src="/{{$this_section->avatar}}" style="height: 20px; width: 20px;">{{ $this_section->title }}</a>
                                @php $n = count($this_section->children) @endphp
                                @while ($n > 0)
                                    @foreach ($this_section->children as $child)
                                    <a class="dropdown-item" href="javascript:void(0);" data-id="{{$this_section->id}}" data-type='s'>{{ $child->title }}</a>
                                    @php $n-- @endphp
                                    @endforeach
                                @endwhile
                            @endforeach
                        @endif
                    {{-- @php  @endphp --}}
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
            <input id="file-5" name="photo" class="file" type="file">
            <div class="d-flex mt-3 pb-3 justify-content-center">
                <div>
                    {{Form::submit(__('Create'), ['class'=>'btn btn-primary'])}}
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
