{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <div class="border border-dark m-4">
        <div class="border border-dark mx-4 mt-3">
            <h5 class="m-2">Nume categorie</h5>
            <div class="border border-dark m-2">
                Nume Sectioune   gasdgasg
            </div>
        </div>
        <div align='center'>
            @if (auth()->user()->isOnline())
                <h1>Acest user este online</h1>
            @endif
        </div>
        <div class="border border-dark mx-4 mt-3">
            <h5 class="m-2">Nume categorie</h5>
            <div class="border border-dark m-2">
                Nume Sectioune   gasdgasg
            </div>
        </div>
    </div>
{{--@endsection--}}