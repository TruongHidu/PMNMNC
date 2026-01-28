<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            CheckTimeAccess::class
        ];
    }
    //
    public function index(){
        $title = "Product";
        return view('product.index', ['title'=> $title,
    'products'=>[
        ['id'=>1, 'name'=>'IphoneX', 'price'=>200000],
        ['id'=>2, 'name'=>'Iphone12', 'price'=>200000],
        ['id'=>3, 'name'=>'Iphone17', 'price'=>600000],
    ],
    ]);
    }
    public function getDetail($id='123'){
        return view('product.detail',['id'=>$id]);
    }
    public function create(){
        return view('product.add');
    }
    public function store(Request $request){
        dd($request->all());
    }

}
