@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', "", ['class' => 'form-control'])}}
        </div>
        <div class="form-check">
            <input class="form-check-input" name="isStaff" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
                Example checkbox
            </label>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection