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

    public function SignIn() {
        return view('signin');
    }
    
    public function CheckSignIn(Request $request) {

        $request->validate([
            'username'=> 'required',
            'password'=> 'required|min:6',
            'repass'=> 'required|same:password',
            'mssv' => 'required',
            'lopmonhoc' => 'required',
            'gioitinh' => 'required',
        ],[
            'username.required'=>'Vui lòng nhập tên sinh viên',
            'password.required'=>'Vui lòng điền mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
            'repass.required'=>'Vui lòng nhập lại mật khẩu',
            'repass.same'=>'Mật khẩu không khớp',
            'mssv.required'=>'Vui lòng nhập MSSV',
            'lopmonhoc.required'=>'Vui lòng nhập lớp môn học',
            'gioitinh.required'=>'Vui lòng chọn giới tính',
        ]);
    
        $data = $request->all();
    
        if (
            $data['username'] == 'TruongnvTruongnv' &&
            $data['password'] == '123456' &&
            $data['repass'] == '123456' &&
            $data['mssv'] == '0093867' &&
            $data['lopmonhoc'] == '67PM1' &&
            $data['gioitinh'] == 'nam'
        ) {
            return redirect('/')->with('success', 'Đăng ký thành công');
        }
    
        return back()->withErrors([
            'signin' => 'Thông tin đăng ký không đúng'
        ])->withInput();
        
    }
    
    public function age(){
        return view('age');
    }
    
    public function saveAge(Request $request){
        $request->validate([
            'age' => 'required|integer'
        ],[
            'age.required' => 'Vui lòng nhập tuổi',
            'age.integer' => 'Tuổi phải là số',
           
        ]);
    
        session(['age' => $request->age]);
    
         return redirect()->route('product.index');
    }
    
    
}
