<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

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
    if(Auth::user()){
        if(Auth::user()->is_admin == 1){
                return redirect('/admin');
        }else{
                return redirect('/user');
        }
    }else{
        return redirect('login');
    }
});

Auth::routes();

Route::group(['middleware' => ['auth','customer','user']], function () {
    Route::resource('user', 'UserController');
});
Route::group(['middleware' => ['auth','customer','admin']], function () {
    Route::resource('admin', 'AdminController');
});


