@extends('layouts.main')

@section('title')
    Edit Student
@endsection

@section('main-section')
   <div class="container py-5">
       
    <div class="col-6 mx-auto py-3 px-5 bg-light">
        <h2 class="text-center py-3">Edit Student</h2>


        <form action="{{route('student.update',$std->student_id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <input type="text" name="name" placeholder="Enter Name" class="form-control @error('name') border-danger @enderror " value="{{$std->name}}">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Enter email" class="form-control @error('email') border-danger @enderror " value="{{$std->email}}">
            </div>
            <div class="mb-3">
                <select name="department" class="form-control text-secondary @error('department') border-danger @enderror ">
                    {{-- <option disabled selected>Department</option> --}}
                    @foreach ($dept as $item)
                        <option value="{{$item->department_name}}" @if ($std->department == $item->department_name)
                            selected
                        @endif>{{$item->department_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="address" placeholder="Enter address" class="form-control @error('address') border-danger @enderror " value="{{$std->address}}">
            </div>
            <div class="mb-3">
                <input type="text" name="phone" placeholder="Enter phone" class="form-control @error('phone') border-danger @enderror " value="{{$std->phone}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>


    
   </div>
   
@endsection