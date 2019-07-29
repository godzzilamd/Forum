@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="col-md-4">
            <div class="ml-3 mt-2">
                <a href="/category/{{$category->id}}">{{ $category->title }}</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container bg-white">
        @csrf
        {!! Form::open(['action' => ['CategoryController@update', $category], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $category->title, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <label class="control-label" for="name">Incarca o imagine</label>
        <input id="file-5" name="photo" class="file" type="file" value="D:\Xampp\htdocs\Forum\storage\app\public\category/category.jpg">
        <div class="form-check">
            <input class="form-check-input" name="isStaff" type="checkbox"
                   id="gridCheck1" {{$category->isStaff ? "checked" : ""}}>
            <label class="form-check-label" for="gridCheck1">
                is staff
            </label>
        </div>
        <div class="d-flex justify-content-center mt-3 pb-3">
            <div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Edit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
