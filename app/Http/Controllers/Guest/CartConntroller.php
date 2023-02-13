<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Products;
use App\Models\ACOUNT;
use App\Models\USER_ADDRESS;
use App\Models\VOUCHER;
use App\Models\Order;
use Carbon\Carbon;


class CartConntroller extends Controller
{
    //




    public function getViewcart()
    {

        if (!Auth::check()) {
            return back()->with('toast-message', 'Vui lòng đăng nhập để thực hiện chức năng này');
        } else {
            $user_id = Auth::user()->id;
            $cart = $this->getCart($user_id);
            $array = [
                'cart' => $cart,
            ];
            session()->forget('voucherKH');

            //  dd($array);
            return view('guest.pages.carts.cart-item')->with($array);
        }
    }
    public function getCheckoutProcess()
    {
        $listOrder = session()->get('listCheckOut');
        $addressCheckout = USER_ADDRESS::where('id_tk', $listOrder['id_tk'])->where('status', 1)->first();
        $productCheckout = [];
        //dd($listOrder['checkList']);
        foreach ($listOrder['checkList'] as $key) {
            $prod = Cart::where('id', $key)->first();
            $prod->product = Products::where('id', $prod->id_pro)->first();
            $prod->image = ProductImage::where('id_pro', $prod->id_pro)->get();
            array_push($productCheckout, $prod);
        }
        //dd($productCheckout);
        $array = [
            'userAddress' => $addressCheckout,
            'productList' => $productCheckout,
            'codeVoucher' => $listOrder['code'],
            'total' => $listOrder['total'],
        ];

        // dd($array);
        return view('guest.pages.carts.checkout-process')->with($array);
    }

    public function ajaxGetCheckOutProcess(Request $request)
    {
        if ($request->ajax()) {
            $OrderCheckout = [
                'id_tk' => Auth::user()->id,
                'checkList' => $request->checkList,
                'total' => $request->total,
                'code' => $request->code,
            ];
            if ($request->checkList == null) {
                return [
                    'status' => 'await',
                ];
            } else {
                session()->put('listCheckOut', $OrderCheckout);
                return [
                    'status' => 'continue',
                ];
            }
        }
    }

    public function getSuccess()
    {
        return view('guest.pages.carts.checkout-success');
    }


    // add to cart
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
            $prod =  Products::where('id', $request->id_sp)->first();
            // kiểm tra k có id tài khoản trùng thi thêm mới
            if (count(Cart::where('id_tk', Auth::user()->id)->get()) == 0) {
                Cart::create($array);
                // Trừ tồn kho trong table Product
                session()->forget('qtyCart');
                session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
                return [
                    'status' => 'new one',
                ];
            } else { // id_tk có trong data
                foreach (Cart::where('id_tk', Auth::user()->id)->get() as $cart) {
                    if ($cart->id_pro == $request->id_sp) {
                        $qty = intval(Cart::where('id_tk', Auth::user()->id)->where('id_pro', $request->id_sp)->first()->quanity);
                        $qty += $request->qty;
                        $qtyInStock = Products::where('id', $request->id_sp)->first()->quantity;
                        $pro_name = Products::where('id', $request->id_sp)->first()->name;
                        if ($qty > $qtyInStock || $qty > 5) {
                            return [
                                'status' => 'already have',
                                'qtyInStock' => $qtyInStock,
                            ];
                        }
                        Cart::where('id_tk', Auth::user()->id)->where('id_pro', $request->id_sp)->update(['quanity' => $qty]);
                        session()->forget('qtyCart');
                        session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
                        // Trừ tồn kho trong table Product
                        return [
                            'status' => 'update',
                            'pro_name' => $pro_name,
                        ];
                    }
                }
                if ($prod->status == 1 || $prod->quantity >= $request->qty) {
                    Cart::create($array);
                    // Trừ tồn kho trong table Product
                    session()->forget('qtyCart');
                    session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
                    return [
                        'status' => 'new one',
                    ];
                } else {
                    return [
                        'status' => 'he',
                    ];
                }
            }
        }
    }

    // update cart
    public function ajaxUpdateCart(Request $request)
    {
        if ($request->ajax()) {

            $data = [
                'status' => '',
                'newQty' => '',
                'newPrice' => '',
            ];
            // tìm sản phẩm có id truyền vào trùng với id trong cart
            $cart = Cart::where('id', $request->id)->first();
            $product = Products::where('id', $cart->id_pro)->first();
            $qty = intval($cart->quanity);
            if ($request->type === 'plus') {
                $qtyInStock = $product->quantity;
                // print_r($qtyInStock);
                if ($qty <= $qtyInStock) {
                    Cart::where('id', $request->id)->update(['quanity' => ++$qty]);
                    session()->forget('qtyCart');
                    session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
                } else {
                    $data['status'] = 'not enough';
                    $data['qtyInStock'] = $qtyInStock;
                    return $data;
                }
            } else {
                Cart::where('id', $request->id)->update(['quanity' => --$qty]);
                session()->forget('qtyCart');
                session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
            }
            $data['newQty'] = $qty;
            $newPrice = ($product->price * ((100 - $product->discount) / 100)) * $qty;
            $data['newPrice'] = number_format($newPrice, 2);

            return $data;
        }
    }

    public function AjaxDeleteCart(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            // print_r($data);

            Cart::where('id', $id)->delete();
            $data = [
                'status' => 'Delete success',
            ];
            session()->forget('qtyCart');
            session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
            return $data;
        }
    }

    public function AjaxDeleteSelectCart(Request $request)
    {
        if ($request->ajax()) {
            if ($request->idList == 'all-cart') {
                Cart::where('id_tk', Auth::user()->id)->delete();
                session()->forget('qtyCart');
                session()->put('qtyCart', intval(Cart::where('id_tk', Auth::user()->id)->sum('quanity')));
                return back();
            }
        }
    }

    public function AjaxGetProvisionalOrder(Request $request)
    {
        if ($request->ajax()) {
            $response = [
                'provisional' => 0,
                'voucher' => session()->get('voucherKH') ? session()->get('voucherKH') : null
            ];

            if (empty($request->idList)) {
                return $response;
            }
            $id_tk = Auth::user()->id;
            foreach ($request->idList as $id_cart) {
                $cart = Cart::where('id', $id_cart)->first();
                $product = Products::where('id', $cart->id_pro)->first();
                if ($product->status) {
                    $qtyInStock = $product->quantity;
                    // print_r($qtyInStock);
                    if ($qtyInStock > 0) {
                        $priceKm = $product->price * ((100 - $product->discount) / 100);
                        $qtyInCart = Cart::where('id_tk', $id_tk)->where('id_pro', $cart->id_pro)->first()->quanity;
                        $response['provisional'] += $priceKm * $qtyInCart;
                    }
                }
            }
            return $response;
        }
    }

    // get all cart
    public function getCart($id_tk)
    {
        $cart = [
            'cart' => [],
            'qty' => 0,
            'total' => 0,
            'address' => [],
        ];
        $i = 0;

        if (count(Cart::where('id_tk', $id_tk)->get()) == 0) {
            return $cart;
        }

        foreach (Cart::where('id_tk', $id_tk)->get() as $item) {
            $product = Products::where('id', $item->id_pro)->first();
            $image = ProductImage::where('id_pro', $item->id_pro)->get();
            $cart['address'] = USER_ADDRESS::where('id_tk', $id_tk)->get();
            $thanhtien = $item->quanity * ($product->price * ((100 - $product->discount) / 100));
            $pro_item = [
                'id' => $item->id,
                'product' => $product,
                'image' => $image,
                'sl' => $item->quanity,
                'thanhtien' => $thanhtien,
                'hethang' => false,
            ];

            $qtyInStock = Products::where('id', $item->id_pro)->first()->quantity;

            if (!$qtyInStock) {
                $pro_item['hethang'] = true;
            } else {
                $cart['total'] += $pro_item['thanhtien'];
            }
            array_push($cart['cart'], $pro_item);
            $cart['qty']++;
        }
        return $cart;
    }


    public function ajaxVoucher(Request $request)
    {
        if ($request->ajax()) {
            $data = [
                'status' => '',
            ];
            $total = ltrim($request->total, '$');
            $isCheckOrder = Order::where('id_tk', Auth::user()->id)->get();
            if (!session()->get('voucherKH')) {
                if (count($isCheckOrder) > 0) {
                    $voucher = VOUCHER::where('code', $request->idVoucher)->first();
                    if ($voucher) {
                        if ($total >= $voucher->condition) {
                            $dateNow = Carbon::now();
                            if ($dateNow >= $voucher->dateStart && $dateNow <= $voucher->endStart) {
                                if ($voucher->quanity > 0) {
                                    $voucherKH = [
                                        'code' => $voucher->code,
                                        'condition' => $voucher->condition,
                                        'discount' => $voucher->discount,
                                    ];
                                    $data = [
                                        'status' => 'Success',
                                    ];
                                    session()->put('voucherKH', $voucherKH);
                                    return $data;
                                } else {
                                    $data = [
                                        'status' => 'out of stock',
                                    ];
                                }
                            } else {
                                $data = [
                                    'status' => 'Expired voucher',
                                ];
                                return $data;
                            }
                        } else {
                            $data = [
                                'status' => 'not enough condition',
                            ];
                            return $data;
                        }
                    } else {
                        $data = [
                            'status' => 'wrong code',
                        ];
                        return $data;
                    }
                } else {
                    // Khách hàng chưa mua hàng lần nào không áp dụng voucher
                    $data = [
                        'status' => 'first time buy',
                    ];
                    return $data;
                }
            } else {
                $data = [
                    'status' => 'code entered',
                ];
            }
        }
    }
}
