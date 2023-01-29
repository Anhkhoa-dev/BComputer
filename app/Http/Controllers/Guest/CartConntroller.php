<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartConntroller extends Controller
{
    //




    public function getViewcart()
    {
        if (!Auth::check()) {
            return back()->with('error-message', 'Vui lòng đăng nhập để thực hiện chức năng này');
        } else {
            return view('guest.pages.carts.cart-item');
        }
    }
    public function getCheckoutProcess()
    {
        return view('guest.pages.carts.checkout-process');
    }

    public function getSuccess()
    {
        return view('guest.pages.carts.checkout-success');
    }

    public function addToCart(Request $request){
        dd($request->ajax());
    }



}
