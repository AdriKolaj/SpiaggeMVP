@extends('layouts.auth')

@section ('content')
    @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div id="app"></div>
@endsection
