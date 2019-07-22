@extends('layouts.app')

@section('content')
<div class="container">
    @csrf
    {!! Form::open(['action' => ['CategoryController@update', $category], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <label class="control-label" for="name">Incarca o imagine</label>
        <input id="file-5" name="photo" class="file" type="file" multiple>
        <div class="form-check">
            <input class="form-check-input" name="isStaff" type="checkbox" id="gridCheck1" {{$category->isStaff ? "checked" : ""}}>
            <label class="form-check-label" for="gridCheck1">
                is staff
            </label>
        </div>
    {{Form::hidden('_method','PUT')}}

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
    {!!Form::open(['action' => ['CategoryController@destroy', $category], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}


</div>
@endsection