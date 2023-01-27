@extends('layouts.main')

@section('title')
    Students
@endsection

@section('main-section')
   <div class="container py-5">

    @if (session()->has('success'))
    {{-- <div class="alert alert-success text-center" id="alert">Student Added Successfully !</div> --}}
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
     <div><strong>Congratulations </strong>Student Added Successfully !</div>
     <button type="button" class="btn float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
   </div>
   
@endif
@if (session()->has('danger'))
    {{-- <div class="alert alert-danger text-center" id="alert">Student Deleted Successfully !</div> --}}
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
     <div><strong>Congratulations </strong>Student Deleted Successfully !</div>
     <button type="button" class="btn float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
   </div>
   
@endif
@if (session()->has('warning'))
    {{-- <div class="alert alert-danger text-center" id="alert">Student Deleted Successfully !</div> --}}
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
     <div><strong>Congratulations </strong>Student Updated Successfully !</div>
     <button type="button" class="btn float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
   </div>
   
@endif
       <div class="col-12 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Students Data</h3>
            <a href="{{route('student.create')}}" class="btn btn-primary">Add Student</a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Roll</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stu as $key => $item)
                
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->department}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    <a href="{{route('student.edit',Crypt::encryptString($item->student_id))}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('student.destroy', $item->student_id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      
      {{$stu->links('pagination::bootstrap-5')}}

   </div>
@endsection