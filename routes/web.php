<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('test', function () {
    return response()->json("Hello world");
});

Route::prefix('product')->name('product.')->controller(ProductController::class)->middleware(CheckTimeAccess::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/add', 'create')->name('create');

    Route::post('/', 'store')->name('store');

    Route::get('/detail/{id}', 'getDetail')->name('show');

});


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


Route::resource('test', TestController::class);