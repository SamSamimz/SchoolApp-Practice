@extends('layouts.main')

@section('title')
    Add Student
@endsection

@section('main-section')
   <div class="container py-5">
       
    <div class="col-6 mx-auto py-3 px-5 bg-light">
        <h2 class="text-center py-3">Add Student</h2>


        <form action="{{route('student.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" placeholder="Enter Name" class="form-control @error('name') border-danger @enderror " value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Enter email" class="form-control @error('email') border-danger @enderror " value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <select name="department" class="form-control text-secondary @error('department') border-danger @enderror " value="{{old('department')}}">
                    <option disabled selected>Department</option>
                    @foreach ($dep as $item)
                        <option value="{{$item->department_name}}">{{$item->department_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="address" placeholder="Enter address" class="form-control @error('address') border-danger @enderror " value="{{old('address')}}">
            </div>
            <div class="mb-3">
                <input type="text" name="phone" placeholder="Enter phone" class="form-control @error('phone') border-danger @enderror " value="{{old('phone')}}">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>


    
   </div>
   
@endsection