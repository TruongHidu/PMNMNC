<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('test', function () {
    return response()->json("Hello world");
});

Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {

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
Route::get('login', [ProductController::class,'login'])->name('login');
Route::post('login', [ProductController::class, 'handleLogin'])->name('login.post');