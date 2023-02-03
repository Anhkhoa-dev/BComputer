<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products;
use App\Models\ACOUNT;


class CartConntroller extends Controller
{
    //




    public function getViewcart()
    {
        if (!Auth::check()) {
            return back()->with('error-message', 'Vui lòng đăng nhập để thực hiện chức năng này');
        } else {
            $user_id = Auth::user()->id;
            $listCartbyUser = Cart::where('id_tk', $user_id)->get();
            foreach ($listCartbyUser as $i => $key) {
                if ($key->id_pro) {
                    $listCartbyUser[$i]->image = ProductImage::where('id_pro', $key->id_pro)->get();
                } else {
                    $listCartbyUser[$i]->image = '';
                }
                if ($key->id_pro) {
                    $listCartbyUser[$i]->name = Products::where('id', $key->id_pro)->first()->name;
                } else {
                    $listCartbyUser[$i]->name = '';
                }
                if ($key->id_pro) {
                    $listCartbyUser[$i]->price = Products::where('id', $key->id_pro)->first()->price;
                } else {
                    $listCartbyUser[$i]->price = '';
                }
                if ($key->id_pro) {
                    $listCartbyUser[$i]->discount = Products::where('id', $key->id_pro)->first()->discount;
                } else {
                    $listCartbyUser[$i]->discount = '';
                }
            }

            $array = [
                'listCart' => $listCartbyUser,
            ];
            return view('guest.pages.carts.cart-item')->with($array);
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

    public function addToCart(Request $request)
    {
        if ($request->ajax()) {
            if (!Auth::check()) {
                return [
                    'status' => 'login required'
                ];
            }
            $array = [
                'id_tk' => Auth::user()->id,
                'id_pro' => $request->id_sp,
                'quanity' => $request->qty,
            ];
            // kiểm tra k có id tài khoản trùng thi thêm mới
            if (count(Cart::where('id_tk', Auth::user()->id)->get()) == 0) {
                Cart::create($array);
                // Trừ tồn kho trong table Product
                return [
                    'status' => 'new one',
                ];

            } else { // id_tk có trong data
                foreach (Cart::where('id_tk', Auth::user()->id)->get() as $cart) {
                    if ($cart->id_pro == $request->id_sp) {
                        $qty = intval(Cart::where('id_tk', Auth::user()->id)->where('id_pro', $request->id_sp)->first()->quanity);
                        $qty += $request->qty;
                        $qtyInStock = Products::where('id', $request->id_sp)->first()->quantity;
                        if ($qty > $qtyInStock || $qty > 5) {
                            return [
                                'status' => 'already have',
                                'qtyInStock' => $qtyInStock,
                            ];
                        }
                        Cart::where('id_tk', Auth::user()->id)->where('id_pro', $request->id_sp)->update(['quanity' => $qty]);
                        // Trừ tồn kho trong table Product
                        return [
                            'status' => 'update',
                        ];
                    }
                }
                Cart::create($array);
                return [
                    'status' => 'new one',
                ];
            }
        }

    }
}
