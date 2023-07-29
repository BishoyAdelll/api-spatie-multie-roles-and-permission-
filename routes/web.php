<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin',function (){ return view ('test.admin');});
});

// for using permission 
// Route::group(['middleware' => ['can:user.view']], function () {
//     Route::get('/admin',function (){ return view ('test.admin');});
// });  
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user',function (){ return view ('test.user');});
});
Route::group(['middleware' => ['role:teacher']], function () {
    Route::get('/teacher',function (){ return view ('test.teacher');});
});
Route::group(['middleware' => ['role:center']], function () {
    Route::get('/center',function (){ return view ('test.center');});
});
require __DIR__.'/auth.php';
