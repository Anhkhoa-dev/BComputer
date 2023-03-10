<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\USER_ADDRESS;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\ACOUNT;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getAccount()
    {
        session()->forget('dataLisTraCuu');
        $addressDefault = $this->getAddressDefault(Auth::user()->id);
        $array = [
            'page' => 'sec-taikhoan',
            'addressDefault' => $addressDefault,
            'orderList' => session('orderList'),
        ];

        return view('guest.pages.accounts.taikhoan')->with($array);
    }

    public function ajaxChangeName(Request $request)
    {
        if ($request->ajax()) {
            User::where('id', intval($request->id))->update(['fullname' => $request->name]);
            return [
                'status' => 'success',
            ];
        }
    }
    public function ajaxChangeImage(Request $request)
    {
        if ($request->ajax()) {
            // print_r($request->all());
            $user = Auth::user();
            if ($request->hasfile('change-avt-inp')) {
                $file = $request->file('change-avt-inp');
                $fileName = $file->getClientOriginalName();
                $file->move("image/user", $fileName);
            }
            ACOUNT::where('id', $user->id)->update(['image' => $fileName]);
            return [
                'status' => 'success',
            ];
        }
    }
    public function ajaxChangePass(Request $request)
    {
        if ($request->ajax()) {
            User::where('id', intval($request->id))->update(['password' => bcrypt($request->password)]);
            return [
                'status' => 'success',
            ];
        }
    }

    // Phần xử lý add Địa chỉ giao hàng của 1 user
    public function postAddress(Request $request)
    {
        //  dd($request->all());
        $request->validate(
            [
                'address_fullname_inp' => 'required',
                'address_phone_inp' => 'required',
                'address_city' => 'required',
                'address_district' => 'required',
                'address_ward' => 'required',
                'address_number_inp' => 'required',
            ],
            [
                'address_fullname_inp.required' => 'Full name không được bỏ trống',
                'address_phone_inp.required' => 'Phone không được bỏ trống',
                'address_city.required' => 'Vui lòng chọn Thành phố',
                'address_district.required' => 'Vui lòng chọn Quận huyện',
                'address_ward.required' => 'Vui lòng chọn Phường xã',
                'address_number_inp.required' => 'Vui lòng nhập số nhà, tên đường',
            ],
        );

        $data = [
            'id_tk' => Auth::user()->id,
            'fullname' => $request->address_fullname_inp,
            'phone' => $request->address_phone_inp,
            'address' => $request->address_number_inp,
            'wards' => $request->address_ward,
            'district' => $request->address_district,
            'province' => $request->address_city,
            'status' => $request->check_address_default == "on" ? 1 : 0,
        ];

        $kiemtra = USER_ADDRESS::where('id_tk', Auth::user()->id)->where('status', 1)->first();


        if ($data['status'] == 1) {
            // set tất cả các tài khoản về 0,
            USER_ADDRESS::where('id_tk', Auth::user()->id)->update(['status' => 0]);
            USER_ADDRESS::create($data);
            return back()->with('success_message', 'Đăng ký tài khoản thành công!');
        } else {
            if ($kiemtra == null) {
                $data['status'] = 1; // kiểm tra người dùng chưa đặt địa chỉ mặc định thì set tài khoản mới nhập là mặc định
                USER_ADDRESS::create($data);
                return back()->with('success_message', 'Đăng ký tài khoản thành công!');
            } else {
                USER_ADDRESS::create($data);
                return back()->with('success_message', 'Đăng ký tài khoản thành công!');
            }
        }
    }

    public function getAddress()
    {

        $addressDefault = USER_ADDRESS::where('id_tk', Auth::user()->id)->where('status', 1)->first();
        $addressAll = USER_ADDRESS::where('id_tk', Auth::user()->id)->where('status', 0)->get();
        $array = [
            'page' => 'sec-diachi',
            'addressDefault' => $addressDefault,
            'addressAll' => $addressAll,
            'orderList' => session('orderList'),
        ];

        return view('guest.pages.accounts.taikhoan')->with($array);
    }

    public function setDefaultAddress()
    {
        $id = Auth::user()->id;
        $url = url()->current();
        $url_name = pathinfo($url, PATHINFO_BASENAME); // trả về 3
        USER_ADDRESS::where('id_tk', $id)->update(['status' => 0]);
        USER_ADDRESS::where('id', $url_name)->update(['status' => 1]);

        return redirect('account/address');
    }

    public function getOrder()
    {
        $orderList = Order::where('id_tk', Auth::user()->id)->paginate(5);
        //dd($orderList);
        foreach ($orderList as $i => $key) {
            if ($key->id) {
                $orderList[$i]->OrderDetail = OrderDetails::where('id_order', $key->id)->get();
                $orderList[$i]->TotalSum = OrderDetails::where('id_order', $key->id)->sum('totalItem');
                foreach ($orderList[$i]->OrderDetail as $s =>  $item) {
                    if ($item->id_pro) {
                        $orderList[$i]->OrderDetail[$s]->image = ProductImage::where('id_pro', $item->id_pro)->first()->image;
                        $orderList[$i]->OrderDetail[$s]->name = Products::where('id', $item->id_pro)->first()->name;
                    } else {
                        $orderList[$i]->OrderDetail[$s]->image = '';
                        $orderList[$i]->OrderDetail[$s]->name = '';
                    }
                }
            } else {
                $orderList[$i]->OrderDetail = '';
            }
        }

        $array = [
            'page' => 'sec-donhang',
            'orderList' => $orderList,
        ];

        // session()->put('orderList', $orderList);
        return view('guest.pages.accounts.taikhoan')->with($array);
    }

    public function getOrderDetail($id)
    {
        $orderList = Order::where('id', intval($id))->first();
        $orderList->User = USER_ADDRESS::where('id_tk', $orderList->id_tk)->where('status', 1)->first();
        $orderList->Detail = OrderDetails::where('id_order', $orderList->id)->get();
        $orderList->TotalSum = floatval(OrderDetails::where('id_order', $orderList->id)->sum('totalItem'));

        foreach ($orderList->Detail as $i =>  $item) {
            if ($item->id_pro) {
                $orderList->Detail[$i]->image = ProductImage::where('id_pro', $item->id_pro)->first()->image;
                //dd($orderList[$i]->OrderDetail[$s]->image);
                $orderList->Detail[$i]->namePro = Products::where('id', $item->id_pro)->first()->name;
            } else {
                $orderList->Detail[$i]->image = '';
                $orderList->Detail[$i]->namePro  = '';
            }
        }
        $array = [
            'page' => 'sec-orderdetail',
            'orderList' => $orderList,
        ];
        return view('guest.pages.accounts.taikhoan')->with($array);
    }

    public function HuyDonHang(Request $request, $id)
    {
        Order::where('id', $id)->update(['statusOrder' => 'Cancelled']);
        return back();
    }

    public function getAddressDefault($id_tk)
    {
        return USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first() == null ? null : USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first();
    }
}