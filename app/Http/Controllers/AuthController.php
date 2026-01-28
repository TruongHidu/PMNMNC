<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function handleLogin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required|min:6'
        ],[
            'email.required'=>'Vui lòng nhập email',
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


    public function signUp(){
        return view('signup');
    }
    public function handleSignUp(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=> 'required|min:6',
            'rePassword'=>'required|same:password',
            'name'=>'required|min:6',
            'age'=>'required|integer|min:18|max:80'
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự',
            'rePassword.required' => 'Vui lòng nhập lại mật khẩu',
            'rePassword.same' =>'Mật khẩu không khớp',
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Tên phải có ít nhất 6 ký tự','age.required' => 'Vui lòng nhập tuổi',
            'age.integer' => 'Tuổi phải là số',
            'age.min' => 'Tuổi phải từ 18 trở lên',
            'age.max' => 'Tuổi không được quá 60'

        ]
    );
       
        return redirect(route('login'))->with('success', 'Đăng ký thành công');
        
    }
}
