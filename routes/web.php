<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('test', function () {
    return response()->json("Hello world");
});

Route::resource('product', ProductController::class)
    ->middleware(CheckAge::class);



Route::fallback(function (){
    return view('404');
});

//Thông tin sinhvien
Route::get('sinhvien/{name}/{mssv}', function (string $name, string $mssv){
    return view('sinhvien', ['name'=> $name, 'mssv'=> $mssv]);
});


//Ban co
Route::get('banco/{n}', function (int $n){
    if($n <=0 ) return 'Sai định dạng';
    return view('banco', ['n'=> $n]);
});


//login
Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class, 'handleLogin'])->name('login.post');

//Sign Up

Route::get('sign-up',[AuthController::class,'signUp'])->name('signup');
Route::post('sign-up',[AuthController::class, 'handleSignUp'])->name('signup.post');


Route::get('signin', [AuthController::class,'SignIn']);
Route::post('signin', [AuthController::class,'CheckSignIn'])->name('check.signin');


Route::get('age', [AuthController::class, 'age'])->name('age.form');
Route::post('age', [AuthController::class, 'saveAge'])->name('age.save');


Route::resource('test', TestController::class);


Route::get('/admin', function (){
    return view('layout.admin');
});
Route::prefix('admin')
    ->name('admin.')
    ->middleware(CheckAge::class)
    ->group(function () {
        Route::resource('product', ProductController::class);
    });



    //Category
    Route::resource('category', CategoryController::class);
