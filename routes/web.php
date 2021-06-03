<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
        return redirect('/home');
    }
    else{
        return redirect('/login');
    }
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/login', function () {
    
    return view('auth.login');
})->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('/{any}', function () {
    return view('main');
})->where('any', '.*');


// Route::get('/download/{id}', [CustomController::class, 'download']);
