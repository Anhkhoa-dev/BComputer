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
        if ($request->all()) {
            $data = $request->all();
            print_r($data);
            if (!Auth::check()) {
                return [
                    'status' => 'login required',
                ];
            }
            $array = [
                'id_tk' => Auth::user()->id,
                'id_pro' => intval($data['card_product_id']),
                'quanity' => intval($data['card_product_qty']),
            ];

            // lấy toàn bộ sản phẩm đã thêm có thuộc id_tk
            $listCartbyUser = Cart::where('id_tk', $array['id_tk'])->get();
            // kiểm tra k có id tài khoản trùng thi thêm mới
            if (count($listCartbyUser) == 0) {
                Cart::create($array);
                // Trừ tồn kho trong table Product
                return [
                    'status' => 'new one',
                ];

            } else { // id_tk có trong data
                foreach ($listCartbyUser as $value) {
                    if ($value['id_pro'] == $array['id_pro']) {
                        $qty = intval(Cart::where('id_tk', $array['id_tk'])->where('id_pro', $array['id_pro'])->first()->quanity);
                        $qty += $array['quanity'];
                        $qtyInStock = Products::where('id', $array['id_pro'])->first()->quantity;
                        if ($qty > $qtyInStock || $qty > 5) {
                            return [
                                'status' => 'already have',
                                'qtyInStock' => $qtyInStock,
                            ];
                        }
                        Cart::where('id_tk', $array['id_tk'])->where('id_pro', $array['id_pro'])->update(['quanity' => $qty]);
                        // Trừ tồn kho trong table Product
                        return [
                            'status' => 'update',
                        ];
                    }
                }
                Cart::create($array);
                // Trừ tồn kho trong table Product

                return [
                    'status' => 'new one',
                ];
            }
        }

    }
}