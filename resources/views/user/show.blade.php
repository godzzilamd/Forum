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
                <div class="ml-3">Profil /</div>
                <div class="pl-3"><img src="/storage/user/{{ $user->id . '/50_' . $user->avatar }}" class="img_16"></div>
                <div class="ml-2">{{ $user->name }}</div>
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
    <div class="container pb-4 rounded" style="background-color:#ebebe0">
        <div class="d-flex pt-5">
            <div class="pl-4 mr-4">
                <img src="/storage/user/{{ $user->id . '/100_' . $user->avatar }}">
            </div>
            <div class="mb-5">
                <div class="d-flex mb-4">
                    <div class="mr-3">
                        <div class="dropdown ml-3" style="font-size:24px">
                            <i class='material-icons btn p-0 m-0' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">settings</i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Edit Details</a>
                                <a class="dropdown-item" href="/user/supload/{{ $user->id }}">Upload avatar</a>
                                <a class="dropdown-item" href="#">Remove avatar</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="mt-1">{{ $user->name . '#' . $user->tag }}</h3>
                    </div>
                </div>
                <div style="font-size:20px">
                    <label>Registration date : {{ $user->created_at }}</label><br>
                    <label>Messages : {{ count($user->posts) }}</label><br>
                    <label>Prestige : {{ count($user->likes) }}</label><br>
                    <label>@if ($user->isOnline()) <img src="/storage/user/on-off2.png" class="mb-1 mr-2">Online @else <img src="/storage/user/on-off1.png" class="mb-1 mr-2">Offline</label> @endif<br>
                    <label>Genul : Isus</label>
                </div>
            </div>
        </div>
        <div class="border-roundest">
            <h2 class="mt-2 ml-4">title</h2>
            <label class="mx-2">of of of</label>
        </div>
    </div>
@endsection
