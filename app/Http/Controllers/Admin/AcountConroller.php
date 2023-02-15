<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ACOUNT;

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
        //
        $prods = ACOUNT::all();
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
    {
        $acc = $request->all();
        $request->validate(
            [
                'email' => 'bail|required|email|regex:/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,3}$/i',
                'fullname' => 'bail|required|min:2',
                'password' => 'bail|required|between:6,16',
                'cpassword' => 'bail|required|same:password|between:6,16'

            ],
            [
                'email.required' => 'Please input Email of Account',
                //'email.unique' => 'Email exist',
                'email.email' => 'Invalid email',
                'email.regex' => 'Email without special characters!',
                'fullname.required' => 'Please input Fullname of Account',
                'fullname.min' => 'Fullname with at least 2 characters',
                'password.required' => 'Password cannot be left blank',
                'password.between' => 'Password must have at least 6 characters and maximum 16 characters',
                'cpassword.required' => 'Password confirm cannot be left blank',
                'cpassword.same' => 'Confirm password does not match. Please re-enter',
                'cpassword.between' => 'Password must have at least 6 characters and maximum 16 characters',
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
        $isCheck = ACOUNT::where('email', $request->email)->first();
        if ($isCheck == null) {
            ACOUNT::create($data);
        return redirect()->route('admin/account')->with('Success', 'Create Account success!');
        } else {
            return back()->withErrors([
                'email' => 'Email exist!'
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
        // $prods = ACOUNT::all();
        // return view('admin.pages.acounts.view', compact('prods'));
        // $show = ACOUNT::where('id',$id)->first();
        //
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
    public function update(Request $request, Acount $acount)
    {
        $prod = $request->all();    // $prod là 1 mảng
        $prod['slug'] = \Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect()->route('admin.acounts.create')
                    ->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            // trường hợp không upload phải lấy hình cũ
            $oldItem = ACOUNT::find($acount->id);
            $imageName = $oldItem->image;
        }
        $prod['image'] = $imageName;
        //$product = new Product($prod);
        $acount->update($prod);
        return redirect()->route('admin.acounts.index');
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
