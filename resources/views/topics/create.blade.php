@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['action' => 'TopicController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', "", ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        {{Form::label('section', 'Section')}}
        <select name="section_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            @foreach(\App\Section::all() as $section)
                @if($section->category)
                    <option value="{{$section->id}}">{{$section->category['title']}}->{{$section->title}}</option>
                @endif
            @endforeach
        </select>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection