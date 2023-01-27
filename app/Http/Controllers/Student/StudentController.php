<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\returnCallback;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('students')->Paginate('10');
        return view('students', 
        [
            'stu' => $student,  
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DB::table('department')->get();
        return view('add',
        [
            'dep' => $department,
        ]
    );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation 
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'department' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]
    );
    DB::table('students')->insert([
        'name' =>  $request->name,
        'email' =>  $request->email,
        'department' =>  $request->department,
        'address' =>  $request->address,
        'phone' =>  $request->phone,
    ]);
    return redirect('student')->with('success','Student Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cid = Crypt::decryptString($id);
        $std = DB::table('students')->where('student_id', $cid)->first();
        if($std != '') {
            $dept = DB::table('department')->get();
            return view('editstudent',
            [
                'std' => $std,
                'dept' => $dept,
            ]
        );
    }else {
        abort('404');
    };
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            //validation 
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'department' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                ]
        );
        DB::table('students')->where('student_id' ,$id)->update([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'department' =>  $request->department,
            'address' =>  $request->address,
            'phone' =>  $request->phone,
        ]);
        return redirect('student')->with('warning','Student Updated Successfully');
        // dd($request->all());
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = DB::table('students')->where('student_id', $id);
        if($student == "") {
            abort('404');
        }else {
            $student->delete();
            return redirect('student')->with('danger', ' ');
        }
    }
}
