@extends('layouts.app')

@section('subheader')
    <div class="d-flex bg-white shadow-sm">
        <div class="d-flex col-md-12" id="nav">
            <div class="btn m-1 border border-dark col-md-2 d-flex">
                <div class="ml-3">Profil /</div>
                <div class="pl-1">@if ($user->avatar) <img src="/storage/user/{{ $user->id . '/50_' . $user->avatar }}" class="img_16"> @endif</div>
                <div class="ml-2">{{ $user->name }}</div>
            </div>
            <div class="d-flex flex-row-reverse col-md-10"> 
                <a href="#">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-arrow-alt-circle-right"></i>
                        Last Topic
                    </div>
                </a>
                <a href="#">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="fas fa-hourglass-start"></i>
                        Started topics
                    </div>
                </a>
                <a href="#">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-images"></i>
                        Album
                    </div>
                </a>
                <a href="#">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="fas fa-address-book"></i>
                        Black list
                    </div>
                </a>
                <a href="/user/{{ $user->id }}/friendlist">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-address-book"></i>
                        Friend list
                    </div>
                </a>
                <a href="#">
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4" id="black">
                        <i class="far fa-user"></i>
                        Profil
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container pb-4 rounded" style="background-color:#ebebe0" id="focus">
        <div class="d-flex pt-5">
            @if ($user->avatar)
                <div class="pl-4 mr-4">
                    <img @if ($user->avatar) src="/storage/user/{{ $user->id . '/100_' . $user->avatar }}" class='ml-2'>@endif<br>
                </div>
            @else
                <div class="pl-4 mr-4" style="width:12%"></div>
            @endif  
            <div class="mb-5">
                <div class="d-flex mb-4">
                    <div class="mr-3">
                        <div class="dropdown ml-3" style="font-size:24px">
                            <i class='material-icons btn p-0 m-0' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">settings</i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Edit Details</a>
                                <a class="dropdown-item" href="/supload/{{ $user->name . '?tag=' . $user->tag }}">Upload avatar</a>
                                <a class="dropdown-item" href="/rupload/{{ $user->id }}">Remove avatar</a>
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
        {{-- <input type="hidden" name=""> --}}
    </div>
@endsection

@section('js')
    <script>
        const main = $('#main');
        const container = $('#focus');
        const nav = $('#nav');
        var i = 0;
        $('#black').click(function(e) {
            e.preventDefault();
            if (i == 0)
            {
                main.css('background-color', '#8c8c8c')
                container.css('background-color', 'white')
                nav.css('background-color', '#8c8c8c')
                i++;
            }
            else
            {
                main.css('background-color', '')
                container.css('background-color', '#ebebe0')
                nav.css('background-color', 'white')
                i--;
            }
        });
    </script>
@endsection