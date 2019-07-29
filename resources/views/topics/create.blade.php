@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow-sm rounded">
        {!! Form::open(['action' => 'TopicController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group pt-2 ">
            {{Form::label('title', 'Topic title')}}
            {{Form::text('title', "", ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        {{ Form::hidden('section_id', '1') }}
            <input type="hidden" name="section_id" value="{{ $section_id }}">
            {{Form::label('body', 'First post', ['class' => 'my-2'])}}
            {!! Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control my-3 py-3']) !!}

        <div class="d-flex justify-content-center">
            <div>
                {{Form::submit('Create', ['class'=>'btn btn-primary my-3'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
