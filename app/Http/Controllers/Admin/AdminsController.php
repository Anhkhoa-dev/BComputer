<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\ACOUNT;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $total = Order::count();
        $received = Order::where('statusOrder', 'Received')->count();
        $confirmed = Order::where('statusOrder', 'Confirmed')->count();
        $complete = Order::where('statusOrder', 'Complete')->count();
        $cancelled = Order::where('statusOrder', 'Cancelled')->count();
        $user = ACOUNT::where('dateRegister', 'Carbon::today()')->where('level', '1')->count();
        $account = ACOUNT::where('level', '1')->count();
        // foreach ($account as $i => $key) {
        //     if ($key->id) {
        //         $account[$i]->buy = Order::where('id_tk', $key->id)->count('id');
        //     } else {
        //         $account[$i]->buy = '';
        //     }
        // }
        // $order = Order::where('id_tk', Auth::user()->id)->count();
        $array = [
            //'order' => $order,
            'total' => $total,
            'received' => $received,
            'confirmed' => $confirmed,
            'complete' => $complete,
            'cancelled' => $cancelled,
            'user' => $user,
            'account' => $account,
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
