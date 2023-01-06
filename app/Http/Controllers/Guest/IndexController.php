<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\USER_ADDRESS;

class IndexController extends Controller
{
    // public function __construct()
    // {
        
    //     $this->user='guest/pages/';
    //     // $this->IndexController = new IndexController;
    // }
    //
    public function getHome(){
         //dd(Auth::user()->image);
        return view('guest.pages.home');
    }



    public function getAddressDefault($id_tk){
        return USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first() == null ? null : USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first();
    }
}
