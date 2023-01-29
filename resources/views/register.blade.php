@extends('layouts.main')

@section('title')
    Register
@endsection

@section('main-section')

    <div class="container">
        <div class="col-6 mx-auto px-4 py-5 bg-light">
            <h2 class="text-center pb-3">Signin to <span class="px-2 py-1 text-warning">| {{config('app.name')}}</span></h2>
            <form action="{{url('/register')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name :" value="{{old('name')}}">
                </div>
                @error('name')
                <li class="text-danger">
                    {{$message}}
                </li>
                @enderror
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
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type Password  :">
                </div>
                @error('password_confirmation')
                <li class="text-danger">
                {{$message}}
                </li>
                @enderror
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <a class="float-right py-3" href="{{route('login')}}">Already have an account?</a>
            </form>
        </div>
    </div>

@endsection