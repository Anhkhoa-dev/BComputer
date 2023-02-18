<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ACOUNT;
use Carbon\Carbon;

class AcountConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    // {
    //     $this->admin='admin/pages/';
    //     // $this->IndexController = new IndexController;
    // }

    public function index()
    {
        //$prods = ACOUNT::all();
        $prods = ACOUNT::paginate(6);
        return view('admin.pages.acounts.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.acounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $format= 'Y/m/d';
        //dd(Carbon::today()->addYear(18)->format('Y/m/d'));
        $acc = $request->all();
        $request->validate(
            [

                'email' => 'bail|required|email|regex:/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,3}$/i',
                'fullname' => 'bail|required|min:2',
                'birthday' => 'bail|required',
                //|before_or_equal:Carbon::today()->subYear(18)->toDateString()',
                'password' => 'bail|required|between:6,16',
                'cpassword' => 'bail|required|same:password|between:6,16'

            ],
            [
                'email.required' => 'Please input Email of Account!',
                'email.email' => 'Invalid email!',
                'email.regex' => 'Email without special characters!',
                //'email.unique' => 'Email exist!',
                'fullname.required' => 'Please input Fullname of Account!',
                'fullname.min' => 'Fullname with at least 2 characters!',
                'birthday.required'=> 'Please input Birthday of Account!',
                'birthday.before_or_equal' => 'Date of birth must be over 18 years old!',
                'password.required' => 'Password cannot be left blank!',
                'password.between' => 'Password must have at least 6 characters and maximum 16 characters!',
                'cpassword.required' => 'Password confirm cannot be left blank!',
                'cpassword.same' => 'Confirm password does not match. Please re-enter!',
                'cpassword.between' => 'Password must have at least 6 characters and maximum 16 characters!',
            ]
        );
        //$token = strtoupper(Str::random(10));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move("image/user", $image);
        } else {
            $image = null;
        }
        $acc['image'] = $image;

        $data = [
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $acc['image'],
            'password' => bcrypt($request->password),
            'level' => 2,
            'status' => intval($acc['status']),
        ];
        //dd(Carbon::today()->addYear(18)->toDateString());
        $isCheck = ACOUNT::where('email', $request->email)->first();
        if ($isCheck == null ||  $acc['birthday'] < Carbon::today()->subYear(18)->toDateString()) {
            ACOUNT::create($data);
            return redirect()->route('admin/account')->with('Success', 'Create Account success!');
        } else {
            return back()->withErrors([
                'email' => 'Email exist!',
                'birthday' => 'Date of birth must be over 18 years old!'
            ])->onlyInput('email');
        }
        // ACOUNT::create($data);
        // return redirect()->route('admin/account')->with('Success', 'Create Account success!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $show = ACOUNT::where('id', $id)->first();
        $array = [
            'filterAcount' => $show,
        ];
        return view('admin.pages.acounts.view')->with($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = ACOUNT::where('id', $id)->first();
        $array = [
            'account' => $account,
        ];
        return view('admin.pages.acounts.update')->with($array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acc = $request->all();
        $request->validate(
            [
                'email' => 'bail|required|email|regex:/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,3}$/i',
                'fullname' => 'bail|required|min:2',
                //'password' => 'bail|required|between:6,16',
                //'cpassword' => 'bail|required|same:password'
            ],
            [
                'email.required' => 'Please input Email of Account!',
                'email.email' => 'Invalid email!',
                'email.regex' => 'Email without special characters!',
                'fullname.required' => 'Please input Fullname of Account!',
                'fullname.min' => 'Fullname with at least 2 characters!',
                //'password.required' => 'Password cannot be left blank!',
                //'password.between' => 'Password must have at least 6 characters and maximum 16 characters!',
                //'cpassword.required' => 'Password confirm cannot be left blank!',
                //'cpassword.same' => 'Confirm password does not match. Please re-enter!',
            ]
        );

        $oldImage = ACOUNT::where('id', $id)->first();

        if ($image = $request->file('image')) {
            $filename = $image->getClientOriginalName();
            $image->move('image/user/', $filename);
            $acc['image'] = "$filename";
        } else {
            $acc['image'] = $oldImage->image;
        }
        $data = [
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $acc['image'],
            'status' => intval($acc['status']),
        ];
        //$isCheck = ACOUNT::where('email', $request->email)->first();
        if ($acc['birthday'] < Carbon::today()->subYear(18)->toDateString()) {
            ACOUNT::where('id', $id)->update($data);
            return redirect()->route('admin/account')->with('Success', 'Update Account success!');
        } else {
            return back()->withErrors([
                //'email' => 'Email exist!',
                'birthday' => 'Date of birth must be over 18 years old!'
            ])->onlyInput('birthday');
        }
        //dd($data);
    }

    public function updateUser(Request $request, $id)
    {
        $acc = $request->all();;
        $data = [
            'status' => intval($acc['status']),
        ];
        ACOUNT::where('id', $id)->update($data);
        return redirect()->route('admin/account')->with('Success', 'Update Account success!');
    }

    public function updateAccount(Request $request, $id)
    {
        $acc = $request->all();
        $request->validate(
            [
                'password' => 'bail|required|between:6,16',
                'cpassword' => 'bail|required|same:password'
            ],
            [
                'password.required' => 'Password cannot be left blank!',
                'password.between' => 'Password must have at least 6 characters and maximum 16 characters!',
                'cpassword.required' => 'Password confirm cannot be left blank!',
                'cpassword.same' => 'Confirm password does not match. Please re-enter!',
            ]
        );
        $data = [
            'password' => bcrypt($acc['password']),
        ];
        ACOUNT::where('id', $id)->update($data);
        return back()->with('Success', 'Update password success!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ACOUNT::where('id', $id)->update(['status' => 0]);
        return back()->with('Success', 'Account has been disabled!');
    }
}
