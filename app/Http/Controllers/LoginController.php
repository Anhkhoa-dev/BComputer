<?php

namespace App\Http\Controllers;

use App\Models\ACOUNT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
            session()->put('user', $user);
            if ($user->status == 1) {
                if ($user->level == 1) {
                    return redirect('/');
                } elseif ($user->level == 2) {
                    return redirect('admin');
                }
            } elseif ($user->status == 0) {
                return route('recovey-account');
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
        $token = strtoupper(Str::random(10));
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'image' => 'avatar-default.png',
            'password' => bcrypt($request->password),
            'level' => 1,
            'status' => 0,
            'active_token' => $token,
            'dateRegister' => Carbon::now(),
            'loginStatus' => 0,
        ];

        $kiemtra = ACOUNT::where('email', $data['email'])->first();

        if ($kiemtra != null) {
            return back()->withErrors([
                'email' => 'Email đã được sử dụng!'
            ])->onlyInput('email');
                
        }
    if($user = ACOUNT::create($data)){
        Mail::send('email.send-mail-active', compact('user'), function($email) use($user)   {
            $email->subject('Email kích hoạt tài khoản từ BComputer shop');
             $email->to($user->email, $user->fullname);
        });
        return view('guest.pages.login.active-account', compact('user'));
        }
    }

        

    public function actived($id, $token){
        $data = [
            'id_tk' => $id,
            'token' => $token,
        ];
        //  dd($data);
         $user = User::where('id', intval($data['id_tk']))->first();
        // dd($user);
        if($user->active_token === $data['token']){
            User::where('id', intval($data['id_tk']))->update(['status'=> 1, 'active_token' => null]);
            return redirect('/login');
        }else{
            return redirect('login')->withErrors([
                'errorMsg' => 'Mã xác nhận sai. vui lòng xác nhận lại!'
            ])->onlyInput('email');
        }
    }

    public function RecoveryAcount()
    {
        return view('guest.pages.login.khoi-phuc-tai-khoan');
    }


    public function getSenMail(){
        Mail::send('email.test', ['name'=> 'Test mail'], function($email){
            $email->subject('Kích hoạt tài khoản');
            $email->to('nguyenkhoa.demolaravel@gmail.com', 'BComputer');
        });
    }
}