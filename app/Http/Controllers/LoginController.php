<?php

namespace App\Http\Controllers;

use App\Models\ACOUNT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function __construct()
    {
        // $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
        // chưa có thư mục lưu hình
        // if(!is_dir('image/user')){
        //     // tạo thư mục lưu hình
        //     mkdir('images/user', 0777, true);
        // }
    }
    public function getLogin()
    {

        if (Auth::check() || session('user')) {
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

        return view('guest.pages.login.login');
    }

    public function postLogin(Request $request)
    {
        //bat lỗi nhập liệu
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

        if (Auth::attempt($data)) {
            // $request->session()->put('email', $data['email']);
            // $user = Auth::user();
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
            //   session()->put('user', $user);
            // dd($user->status);
            if ($user->status == 1) {
                if ($user->level == 1) {
                    return redirect('/');
                } elseif ($user->level == 2) {
                    return redirect('admin');
                }
            } elseif ($user->status == 0) {
                return back()->withErrors([
                    'errorMsg' => 'Tài khoản đang bị khóa, Vui lòng liên hệ admin'
                ])->onlyInput('email');
            }


        }
        return back()->withErrors([
            'errorMsg' => 'Email or password không đúng!'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function getRegister()
    {

        return view('guest.pages.login.dang-ky');
    }

    public function dangky(Request $request)
    {
        $request->validate(
            [
                'email' => 'bail|required|email|regex:/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,3}$/i',
                'fullname' => 'bail|required|min:2',
                'password' => 'bail|required|between:6,16',
                'cpassword' => 'bail|required|same:password|between:6,16'

            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email phải là 1 email họp lệ',
                'email.regex' => 'Email không có ký tự đặc biệt!',
                'fullname.required' => 'Fullname không được bỏ trống',
                'fullname.min' => 'Fullnam có ít nhất 2 ký tự',
                'password.required' => 'Password không được bỏ trống',
                'password.between' => 'Password có ít nhất 6 ký tự và lớn nhất 16 ký tự',
                'cpassword.required' => 'Password confirm không được bỏ trống',
                'cpassword.same' => 'Password confirm không trùng khớp. Vui lòng nhập lại',
                'cpassword.between' => 'Password có ít nhất 6 ký tự và lớn nhất 16 ký tự',
            ]
        );

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'image' => 'avatar-default.png',
            'password' => bcrypt($request->password),
            'level' => 1,
            'status' => 1,
            'dateRegister' => Carbon::now(),
            'loginStatus' => 0,
        ];

        $kiemtra = ACOUNT::where('email', $data['email'])->first();

        if ($kiemtra == null) {
            ACOUNT::create($data);
            return redirect('login')->with('success_message', 'Đăng ký tài khoản thành công!');
        } else {
            return back()->withErrors([
                'email' => 'Email đã được sử dụng!'
            ])->onlyInput('email');
        }
    }

}