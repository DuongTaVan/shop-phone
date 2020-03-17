<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('pages.login');
    }
    public function postLogin(Request $Request){
    	$data = ['email'=>$Request->email,'password'=>$Request->password];
    	if($Request->remember = 'Remember Me'){
    		$remember = true;
    	}
    	else
    		$remember = false;
    	if(Auth::attempt($data,$remember)){
    		return redirect('admin/home');
    	}
    	else
    		return redirect('login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng!');
    }
}
