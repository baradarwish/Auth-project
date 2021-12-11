<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use function GuzzleHttp\Promise\task;


Route::get('/', [TaskController::class,'index']);
Route::post('/store' ,[TaskController::class,'store']);
Route::get('/delete/{id}' ,[TaskController::class,'delete']);
Route::put('edit/{id}', [TaskController::class, 'edit']);
Route::patch('update/{id}', [TaskController::class, 'update']);






// Route::get('tasks', function () {
//     return view('tasks');
//     });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
