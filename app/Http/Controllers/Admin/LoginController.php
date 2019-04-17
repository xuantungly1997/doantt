<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{
    //
    public function getLogin(){
        if(Auth::check()){
            return redirect()->intended('admin/home');
        }
        return view('admin.login.login');
    }

    public function postLogin(Request $request){
        $arr=['email'=>$request->email, 'password'=>$request->password];

        if($request->remember = 'Remember Me'){
            $remember = true;
        }
        else{
            $remember = false;
        }

        if(Auth::attempt($arr,$remember)){
           return redirect()->intended('admin/home');
        }
        else{
            return back()->withInput()->with('error','Tài khoảng hoặc mật khẩu chưa đúng');
        }
    }
}
