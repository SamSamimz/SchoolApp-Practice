<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DptController extends Controller
{
    //index
    public function index() {
        $classes = DB::table('department')->get();
        return view('department', 
        [
            'dept' => $classes,
        ]
    );
    }

    //add
    public function add() {
        return view('deptadd');
    }

    //store
    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        DB::table('department')->insert(
            [
                'department_name' => $request->name,
            ]
        );
        return redirect('department')->with('success', '');
    }
    //delete
    public function delete($id) {
        DB::table('department')->where('id', $id)->delete();
        return redirect('department')->with('danger', ' ');
    }
}
