@extends('layouts.main')

@section('title')
    Add Department
@endsection

@section('main-section')
   <div class="container py-5">
       
    <div class="col-6 mx-auto py-3 px-5 bg-light">
        <h2 class="text-center py-3">Add Department</h2>


        <form action="{{route('department.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" placeholder="Enter Name" class="form-control @error('name') border-danger @enderror " value="{{old('name')}}">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>


    
   </div>
   
@endsection