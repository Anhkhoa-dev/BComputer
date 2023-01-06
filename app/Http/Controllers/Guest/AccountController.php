<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\USER_ADDRESS;
use App\Http\Controllers\Guest\IndexController;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function __construct()
    {
         $this->IndexController = new IndexController;
    }
    public function getAccount(){
        // dd(Auth::user());
        $addressDefault = $this->IndexController->getAddressDefault(Auth::user()->id);
        $array = [
            'page' => 'sec-taikhoan',
            'addressDefault' => $addressDefault,
        ];
        
        return view('guest.pages.accounts.taikhoan')->with($array);

    }


    // Phần xử lý add Địa chỉ giao hàng của 1 user
    public function postAddress(Request $request){

        
        //
    }

    public function getAddress(){

        $addressDefault = USER_ADDRESS::where('id_tk', Auth::user()->id)->where('status', 1)->first();
        $addressAll = USER_ADDRESS::where('id_tk', Auth::user()->id)->where('status', 0)->get();
        $array = [
            'page' => 'sec-diachi',
            'addressDefault' => $addressDefault,
            'addressAll' => $addressAll,
        ];
        // dd($array['addressAll']);
        
        return view('guest.pages.accounts.taikhoan')->with($array);

    }

    public function setDefaultAddress(Request $request){
            // dd($request);
            // $user_tk = USER_ADDRESS::where('id', $request->id)->first();
            // dd($user_tk);
            // USER_ADDRESS::where('id_tk', $request->all() )->where('status', 1)->update(['status' => 0]);
            // USER_ADDRESS::where('id', $request->all())->update(['status' => 1]);

            // $response = [
            //     'message' => 'Đã thay đổi địa chỉ',
            // ];

        
        
    }





















}
