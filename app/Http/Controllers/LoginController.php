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


    public function getLogin()
    {

        if (Auth::check() || session('user')) {

            return back()->with('toast_message', 'You are logged in!');
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
                'email.required' => 'Please enter your email!',
                'password.required' => 'Please enter password!',
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
            'errorMsg' => 'Email or password is incorrect!'
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
                'email.required' => 'Please input Email of Account!',
                'email.email' => 'Invalid email!',
                'email.regex' => 'Email without special characters!',
                'fullname.required' => 'Please input Fullname of Account!',
                'fullname.min' => 'Fullname with at least 2 characters!',
                'password.required' => 'Password cannot be not blank',
                'password.between' => 'Password must have at least 6 characters and maximum 16 characters!',
                'cpassword.required' => 'Password confirm cannot be left blank!',
                'cpassword.same' => 'Confirm password does not match. Please re-enter!',
                'cpassword.between' => 'Password must have at least 6 characters and maximum 16 characters!',
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
                'email' => 'Email exist!'
            ])->onlyInput('email');
        }
        if ($user = ACOUNT::create($data)) {
            Mail::send('email.send-mail-active', compact('user'), function ($email) use ($user) {
                $email->subject('Account activation email from BComputer shop');
                $email->to($user->email, $user->fullname);
            });
            return view('guest.pages.login.active-account', compact('user'));
        }
    }



    public function actived($id, $token)
    {
        $data = [
            'id_tk' => $id,
            'token' => $token,
        ];
        //  dd($data);
        $user = User::where('id', intval($data['id_tk']))->first();
        // dd($user);
        if ($user->active_token === $data['token']) {
            User::where('id', intval($data['id_tk']))->update(['status' => 1, 'active_token' => null]);
            return redirect('/login');
        } else {
            return redirect('login')->withErrors([
                'errorMsg' => 'The verification code is wrong. Please reconfirm!'
            ])->onlyInput('email');
        }
    }

    public function RecoveryAcount()
    {
        return view('guest.pages.error-page');
    }


    public function getSenMail()
    {
        Mail::send('email.test', ['name' => 'Test mail'], function ($email) {
            $email->subject('Active account');
            $email->to('nguyenkhoa.demolaravel@gmail.com', 'BComputer');
        });
    }
}
