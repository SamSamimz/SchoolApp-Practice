@extends('layouts.main')

@section('title')
    Department
@endsection

@section('main-section')
   <div class="container py-5">

       @if (session()->has('success'))
           {{-- <div class="alert alert-success text-center" id="alert">Student Added Successfully !</div> --}}
           <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
            <div><strong>Congratulations </strong>Department Added Successfully !</div>
            <button type="button" class="btn float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
          </div>
          
       @endif
       @if (session()->has('danger'))
           {{-- <div class="alert alert-danger text-center" id="alert">Student Deleted Successfully !</div> --}}
           <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
            <div><strong>Congratulations </strong>Department Deleted Successfully !</div>
            <button type="button" class="btn float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
          </div>
          
       @endif
       <div class="col-12 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Student Department</h3>
            <a href="{{route('department.add')}}" class="btn btn-primary">Add Department</a>
        </div>
    </div>
    <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">SNO</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dept as $key => $item)
                
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$item->department_name}}</td>
                <td>
                    <a href="{{route('department.delete',$item->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      


   </div>
@endsection