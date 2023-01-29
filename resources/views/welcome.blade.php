@extends('layouts.main')

@section('tiitle')
    Welcome
@endsection

@section('main-section')
    <h2 class="alert alert-success text-center">Welcome to SchoolApp, 
        @auth <span class="text-danger font-italic">{{Auth::user()->name}}</span> @endauth
        @guest <span class="text-danger font-italic">{{"Guest"}}</span> @endguest
    </h2>    
@endsection