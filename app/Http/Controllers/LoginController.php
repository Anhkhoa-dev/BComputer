<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    public function  index(){
        
        if($user = Auth::user()){
            if($user->level == '1'){
                return redirect()->route('user/index');
            }elseif($user->level == '2'){
                return redirect()->route('admin/dashboard');
            }
        }

        return view($this->user.'login.login');
    }

    public function postLogin(Request $request){
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ], 
            [
                'email.required' => 'Vui lòng nhập vào email',
                'password.required' => 'Vui lòng nhập vào password',
            ]
        );

        $data = $request->only('email', 'password');
        
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->level == 1){
                return redirect()->route('user/index');
            }elseif($user->level == 2){
                return redirect()->route('admin/dashboard');
            }
            return redirect()->intended('/');
        }


        return back()->withErrors([
            'errorMsg' => 'Email or password không đúng!'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function register(){

        return view($this->user . 'login.dang-ky');
    }

}
