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
                return redirect('/home');
        }
    }else{
        return redirect('login');
    }
});

Auth::routes();

Route::resource('user', 'UserController');
Route::resource('admin', 'AdminController');
Route::get('/sendemail', function () {

    Mail::to('ohm2393@gmail.com')->send(new NewUserNotification()); 

    return 'A message has been sent to Mailtrap!';

});

