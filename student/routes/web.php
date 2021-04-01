<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\BookController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\LoginController;

Route::get('/',[LoginController::class,'index']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('login/logincorrect',[LoginController::class,'checklogin'])->name('student.login');
Route::get('/logout', [LoginController::class,'logout']);

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/add-student',[studentController::class,'addStudent']);
	Route::post('/create-student',[studentController::class,'create'])->name('student.create');
	Route::get('/lists',[studentController::class,'get']);  
	Route::get('/edit-student/{id}',[studentController::class,'find']);
	Route::post('/update-student',[studentController::class,'update'])->name('student.update');
	Route::get('/delete-student/{id}',[studentController::class,'delete']);
	Route::get('/editpage/{id}',[studentController::class,'downloadPdf']);
	Route::get('/students/{id}',[studentController::class,'getStudentId']);
	Route::post('/student/updatestudentaddress',[studentController::class,'updatestudentaddress'])->name('student.updatestudentaddress');

	Route::get('/add-book',[BookController::class,'addBook']);
	Route::post('/create-book',[BookController::class,'create'])->name('book.create'); 
	Route::get('/book-show',[BookController::class,'get']);
	Route::get('/edit-book/{id}',[BookController::class,'find']);
	Route::post('/update-book',[BookController::class,'update'])->name('book.update'); 
	Route::get('/delete-book/{id}',[BookController::class,'delete']);  
});

