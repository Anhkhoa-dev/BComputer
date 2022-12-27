<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Cookie;
use App\Events\sendNotification;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    public function  index(){
        
        if(Auth::check() || session('user')){
            return back()->with('toast_message', 'Bạn đã đăng nhập');
        }
        if(!session()->get('prev_url')){
            $prev_url = '/';
            if(session()->get('_previous')){
                $url = session()->get('_previous')['url'];
                $arrUrl = explode('/', $url);
                $page = $arrUrl[count($arrUrl) - 1];
                // if($page != 'dangky' && $page != 'khoiphuctaikhoan'){
                //     $prev_url = $url;
                // }
            }
            session()->put('prev_url', $prev_url);
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

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'trangthai' => 1,
        ];
        
        if(Auth::attempt($data)){
            $request->session()->put('email', $data['email']);
            $user = Auth::user();

            if($user->loginStatus == 1) {
                $notification = [
                    'user' => $user,
                    'type' => 'logout',
                ];

                //  event(new sendNotification($notification));
            }
            // đăng nhập bình thường
            // else {
            //     $user->loginStatus = 1;
            //     $user->update($user);
            // }

           // session(['email' => $data]);

           $prev_url = session('prev_url');
            if($prev_url){
                session()->forget('prev_url');
                return redirect($prev_url)->with('toast_message', 'Đăng nhập thành công');
            }

            return redirect('/')->with('toast_message', 'Đăng nhập thành công');
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
