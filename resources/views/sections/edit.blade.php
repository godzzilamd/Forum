@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="container">
            {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('category_id', 'Category', ['class' => 'text-light'])}}
                {{Form::select('category_id', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a category', 'class' => 'form-control'])}}
                {{Form::label('parent_id', 'Parent', ['class' => 'text-light mt-2'])}}
                {{Form::select('parent_id', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a category', 'class' => 'form-control'])}}
                {{Form::label('title', 'Title', ['class' => 'text-light mt-2'])}}
                {{Form::text('title', "", ['class' => 'form-control'])}}
                
            </div>
            </div>
        </div>
        <div class="d-flex mt-3">
            <div class="col-md-6" align='right'>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>    
        </div>
    </div>
@endsection