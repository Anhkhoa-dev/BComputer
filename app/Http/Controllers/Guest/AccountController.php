<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function getAccount(){
        // dd($Tinh);

        $array = [
            'page' => 'sec-taikhoan',
        ];
        
        return view('guest.pages.accounts.taikhoan')->with($array);

    }
}
