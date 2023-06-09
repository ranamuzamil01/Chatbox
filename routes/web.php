<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chatcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/chat', function () {
//     return view('chat');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat',[Chatcontroller::class,'index']);
// Route::get('/chat',[RegisterController::class,'viewUser']);

//that use to show use on a chat box
Route::get('/chat/{userId}/{name}', [Chatcontroller::class,'chatstart'])->name('chat');
// Route::get('/chat/{id}', [ChatController::class,'startChat'])->name('chat');
// Route::post('/save-message', [Chatcontroller::class, 'savemessage'])->name('save-message');
Route::post('/save-message', [ChatController::class, 'saveMessage']) ;
route::get('/view-message',[Chatcontroller::class,'viewMessage'])->name('view-message');


// Route::get('student/edit/{id}',[registercontroller::class,'edit']);


// Route::post('logout', 'Api\AuthController@logout')->name('logout');
Route::POST('/logout',[AuthController::class,'Logout'] )->name('logout');
Route::POST('/logout',[AuthController::class,'Logout'] )->name('logout');

// Route::get('/view_user',[RegisterController::class,'viewUser']);
// Route::post('/view_user',[RegisterController::class,'view_user']);