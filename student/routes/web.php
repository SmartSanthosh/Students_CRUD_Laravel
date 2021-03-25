<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\LoginController;

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

Route::get('/',[LoginController::class,'index']);
Route::get('/login',[LoginController::class,'index'])->name('login');

 Route::group(['middleware' => 'auth'], function () {
  Route::get('/add-student',[studentController::class,'addStudent']);
  Route::post('/create-student',[studentController::class,'create'])->name('student.create');
  Route::get('/lists',[studentController::class,'get']);  
  Route::get('/edit-student/{id}',[studentController::class,'find']);
  Route::post('/update-student',[studentController::class,'update'])->name('student.update');
  Route::get('/delete-student/{id}',[studentController::class,'delete']);

  //Route::get('/download',[studentController::class,'downloadPdf']);
  Route::get('/editpage/{id}',[studentController::class,'downloadPdf']);

  Route::get('/students/{id}',[studentController::class,'getStudentId']);

  //Route::post('/senddata/send',[studentController::class,'send']);
});

Route::post('login/logincorrect',[LoginController::class,'checklogin'])->name('student.login');
Route::get('/logout', [LoginController::class,'logout']);


// Route::get('/lists/{id}',[studentController::class,'edit']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
