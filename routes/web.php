<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Logout;
 

Route::get('/', function () {
    //return view('welcome');
    return redirect('login');
});
//Auth::routes();

Route::group(['middleware'=>'guest'],function (){
    Route::get('/login',login::class)->name('login');
    Route::get('/register',register::class)->name('register');
    Route::get('/',function (){
        return view('welcome');
    });
});
Route::group(['middleware'=>['auth']],function (){
        Route::get('/products', Product::class);
        Route::get('/cart', Cart::class);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/logout',register::class)->name('logout');
});


