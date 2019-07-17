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
            <div>Online users</div>
            @foreach ($users as $user)
                @if ($user->isOnline())
                    <div>
                        {{ $user->name }}
                    </div>
                @endif
            @endforeach
        </div>
        <div class="border border-dark mx-4 mt-3">
            <h5 class="m-2">Nume categorie</h5>
            <div class="border border-dark m-2">
                Nume Sectioune   gasdgasg
            </div>
        </div>
    </div>
{{--@endsection--}}