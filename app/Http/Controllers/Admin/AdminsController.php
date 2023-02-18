<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\ACOUNT;

class AdminsController extends Controller
{
    //
    public function __construct()
    {
        // $this->admin = 'admin/pages/';
        // $this->IndexController = new IndexController;
    }
    public function getHome()
    {
        // $this->admin.'home'
        $order = Order::all();
        $total = Order::count();
        $received = Order::where('statusOrder', 'Received')->count();
        $confirmed = Order::where('statusOrder', 'Confirmed')->count();
        $complete = Order::where('statusOrder', 'Complete')->count();
        $cancelled = Order::where('statusOrder', 'Cancelled')->count();
        $array = [
            'order' => $order,
            'total' => $total,
            'received' => $received,
            'confirmed' => $confirmed,
            'complete' => $complete,
            'cancelled' => $cancelled,
            //'productImg' => $productImg
        ];
        return view('admin.pages.home')->with($array);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $order = Order::all();
    //     $orderReceived = Order::where('id', $id)->where('statusOrder','Received')->count('id');

    // $array = [
    //     'orderReceived' => $orderReceived,
    //     //'productImg' => $productImg
    // ];
    // return view('admin.pages.home')->with($array);
    // }


}
