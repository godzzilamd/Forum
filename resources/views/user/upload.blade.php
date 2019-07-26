@extends('layouts.app')

@section('css')
    <style>
        .border-roundest {
            border-style: double;
            border-color: dodgerblue;
            border-radius: 20px;
        }
    </style>
@endsection

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="d-flex col-md-12">
            <div class="btn m-1 border border-dark col-md-2 d-flex">
                <div class="ml-3 mt-1">Profil /</div>
                <div class="pl-1">@if ($user->avatar) <img src="/storage/user/{{ $user->id . '/50_' . $user->avatar }}" class="img_16"> @endif</div>
                <div class="ml-2 mt-1">{{ $user->name }}</div>
            </div>
            <div class="d-flex flex-row-reverse col-md-10"> 
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="far fa-arrow-alt-circle-right"></i>
                    Last Topic
                </div>
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="fas fa-hourglass-start"></i>
                    Started topics
                </div>
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="far fa-images"></i>
                    Album
                </div>
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="fas fa-address-book"></i>
                    Black list
                </div>
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="far fa-address-book"></i>
                    Friend list
                </div> 
                <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                    <i class="far fa-user"></i>
                    Profil
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
{{ Form::open(['action' => ['UserController@upload', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    <div class="container pb-4 rounded" style="background-color:#ebebe0">
        <div class="d-flex pt-5">
            <div class="pl-4 mr-4">
                @if ($user->avatar) <img src="/storage/user/{{ $user->id . '/100_' . $user->avatar }}" class="ml-2"> @else <img src="/storage/user/white.png" class="img_100 ml-2"> @endif<br>
                <label class="mt-2">Your curent avatar</label>
            </div>
            <div class="mb-5">
                <label>Upload a new avatar</label><br>
                <input id="file-5" name="photo" class="file" type="file" multiple>
            </div>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary ml-4 mt-4'])}}
    </div>
{{ Form::close() }}
@endsection
