<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('test', function () {
    return response()->json("Hello world");
});

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    })->name('index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('create');

    Route::post('/', function (Request $request) {
        return redirect()->route('product.index');
    })->name('store');

    Route::get('/{id?}', function ($id='123') {
        return view('product.detail', ['id' => $id]);
    })->name('show');

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