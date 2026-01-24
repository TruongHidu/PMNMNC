<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
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

    public function login(){
        return view('login');
    }
    
    public function handleLogin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required|min:6'
        ],[
            'email.required'=>'Vui lòng nhập emalil',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>"Mật khẩu phải ít nhất 6 ký tự"
        ]);

        $email = $request->email;
        $password = $request->password;
        if($email=='truong@gmail.com'&& $password== '123456'){
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }
        return back()-> with('error', 'Sai email hoặc mật khẩu!');

    }
}
