<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\USER_ADDRESS;
use App\Models\VOUCHER;
use App\Models\Products;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(6);
        foreach ($order as $i => $key) {
            //dd($key->id_tk);
            if ($key->id) {
                $order[$i]->OrderDetialList = OrderDetails::where('id_order', $key->id)->get();
                //dd($order[$i]->username);
            } else {
                $order[$i]->OrderDetialList = '';
            }
            if ($key->id_tk) {
                $order[$i]->username = User::where('id', $key->id_tk)->first();
                //dd($order[$i]->username);
            } else {
                $order[$i]->username = '';
            }
            if ($key->id_tk) {
                $order[$i]->useraddress = USER_ADDRESS::where('id_tk', $key->id_tk)->where('status', 1)->first();
                //dd($order[$i]->username);
            } else {
                $order[$i]->username = '';
            }
            if ($key->id_voucher) {
                $order[$i]->voucher = VOUCHER::where('id', $key->id_vc)->first();
            } else {
                $order[$i]->voucher = '';
            }
        }

        //$orderList = Order::where('id', $id)->get();
        //$orderList = OrderDetails::all();
        $orderDetails = OrderDetails::all();
        //$orderDetails = OrderDetails::where('id_order', $orderList->id)->get();
        foreach ($orderDetails as $i => $key) {
            //dd($key->id_tk);
            if ($key->id_pro) {
                $orderDetails[$i]->product = Products::where('id', $key->id_pro)->first();
                //dd($order[$i]->username);
            } else {
                $orderDetails[$i]->product = '';
            }
        }


        //dd($order);
        $array = [
            'order' => $order,
            'orderDetails' => $orderDetails,
        ];
        //dd($array);
        return view('admin.pages.order')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->statusOrder == 'Confirmed') {
            Order::where('id', $id)->update(['statusOrder' => 'Complete']);
            $OrderDetail = OrderDetails::where('id_order', $order->id)->get();
            foreach ($OrderDetail as $key) {
                $qtyOsStock = Products::where('id', $key->id_pro)->first()->quantity;
                Products::where('id', $key->id_pro)->update(['quantity' => ($qtyOsStock - $key->qty)]);
            }
            return back()->with('Success', 'Order has been Complete!');
        } else {
            Order::where('id', $id)->update(['statusOrder' => 'Confirmed']);
            return back()->with('Success', 'Order has been Confirmed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->update(['statusOrder' => 'Cancelled']);
        return back()->with('Success', 'Order has been cancelled!');
    }
}
