@extends('layouts.app')

@section('content')
<div class="mx-5">
    <table class="table table-striped">
        @foreach ($categories as $category)
            <thead>
                <div class="mx-5">
                    <tr>
                        <th>{{ $category->title }}</th>
                    </tr>
                </div>
            </thead>
            @foreach ($category->sections as $section)
            <div class="mx-3">
                <tbody>
                    <tr>
                        <th scope="row">{{ $section->title }}</th>
                    </tr>
                </tbody>
            </div>
            @endforeach
        @endforeach          
    </table>
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
@endsection