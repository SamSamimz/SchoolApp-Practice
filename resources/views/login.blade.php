@extends('layouts.main')

@section('title')
    Login
@endsection

@section('main-section')

    <div class="container">
        <div class="col-6 mx-auto px-4 py-5 bg-light">
            <h2 class="text-center pb-3">Login to <span class="text-warning px-2 py-1">| {{config('app.name')}}</span></h2>

            <form action="{{url('/login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Enter Email :" value="{{old('email')}}">
                </div>
                @error('email')
                <li class="text-danger">
                {{$message}}
                </li>
                @enderror
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password :">
                </div>
                @error('password')
                <li class="text-danger">
                {{$message}}
                </li>
                @enderror
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="float-right py-3" href="{{route('register')}}">Don't have an account?</a>
            </form>
        </div>
    </div>

@endsection