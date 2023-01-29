<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\RouteUrlGenerator;
use App\Http\Controllers\Student\DptController;
use App\Http\Controllers\Student\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {

    
    Route::group(['prefix' => 'student'], function() {
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        Route::get('/add', [StudentController::class, 'create'])->name('student.create');
        Route::post('/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('/{id}', [StudentController::class, 'update'])->name('student.update');
    });
    
    
    //class
    Route::get('/department', [DptController::class, 'index'])->name('student.department');
    Route::get('/department/add', [DptController::class, 'add'])->name('department.add');
    Route::post('/department/add', [DptController::class, 'store'])->name('department.store');
    Route::get('/department/delete/{id}', [DptController::class, 'delete'])->name('department.delete');
    
});

//auth  { 

//register 
Route::get('/register', [AuthController::class, 'register_index'])->name('register');
Route::post('/register', [AuthController::class, 'register_store'])->name('register.store');

//login
Route::get('/login', [LoginController::class, 'login_index'])->name('login');
Route::post('/login', [LoginController::class, 'login_store'])->name('login.store');


//logout 
Route::get('/logout', [AuthController::class, 'user_logout'])->name('user.logout')->middleware('auth');

// }