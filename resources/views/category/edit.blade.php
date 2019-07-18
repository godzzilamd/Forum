@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['action' => ['CategoryController@update', $category], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-check">
            <input class="form-check-input" name="isStaff" type="checkbox" id="gridCheck1" {{$category->isStaff ? "checked" : ""}}>
            <label class="form-check-label" for="gridCheck1">
                Example checkbox
            </label>
        </div>
    {{Form::hidden('_method','PUT')}}

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    {!!Form::open(['action' => ['CategoryController@destroy', $category], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}


</div>
@endsection