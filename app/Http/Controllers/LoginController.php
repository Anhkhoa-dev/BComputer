<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    public function  getLogin(){
        
        if(Auth::check() || session('user')){
            return back()->with('toast_message', 'Bạn đã đăng nhập');
        }
        // if(!session()->get('prev_url')){
        //     $prev_url = '/';
        //     if(session()->get('_previous')){
        //         $url = session()->get('_previous')['url'];
        //         $arrUrl = explode('/', $url);
        //         $page = $arrUrl[count($arrUrl) - 1];
        //         // if($page != 'dangky' && $page != 'khoiphuctaikhoan'){
        //         //     $prev_url = $url;
        //         // }
        //     }
        //     session()->put('prev_url', $prev_url);
        // }

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

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($data)){
            // $request->session()->put('email', $data['email']);
            // $user = Auth::user();
             $user = User::where('email', $data['email'])->first();
             Auth::login($user);
            //  session()->put('user', $user);
            // dd($user);
            if($user->level == 1) {
                return redirect('/');
            }elseif ($user->level == 2){
                return redirect('admin');
            }
            
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

    public function getRegister(){

        return view($this->user . 'login.dang-ky');
    }

}
