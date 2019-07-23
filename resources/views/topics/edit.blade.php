@extends('layouts.app')

@section('content')
<div class="container bg-white shadow-sm">
    @csrf
    <div class="dropdown show">
    {!! Form::open(['action' => ['TopicController@update', $topic->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group mt-3">
            {{Form::label('title', 'Title', ['class' => 'mt-2'])}}
            {{Form::text('title', $topic->title, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            <input type="hidden" name="section_id" value="{{ $topic->section->id }}">
            <div class="d-flex">
                <div class="custom-control custom-switch mt-3">
                    @if ($topic->closed)
                        <input type="checkbox" name="closed" class="custom-control-input" id="customSwitch1" checked>
                    @else
                        <input type="checkbox" name="closed" class="custom-control-input" id="customSwitch1">
                    @endif
                    <label class="custom-control-label" for="customSwitch1">Locked</label>
                </div>
                <div class="custom-control custom-switch mt-3 ml-5">
                    @if ($topic->post_it)
                        <input type="checkbox" name="post_it" class="custom-control-input" id="customSwitch2" checked>
                    @else
                        <input type="checkbox" name="post_it" class="custom-control-input" id="customSwitch2">                    
                    @endif
                    <label class="custom-control-label" for="customSwitch2">Beauty</label>
                </div>
            </div>
        </div>
    <div class="d-flex mt-3 pb-3 justify-content-center">
        <div>
            {{Form::submit('Edit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function myCall(a1,a2) {
        console.log(a1, a2);
    }
</script>
@endsection