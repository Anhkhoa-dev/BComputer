<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\USER_ADDRESS;
use App\Models\Category;
use App\Models\Products;


class IndexController extends Controller
{
    // public function __construct()
    // {

    //     $this->user='guest/pages/';
    //     // $this->IndexController = new IndexController;
    // }
    //
    public function getHome(){
        $fillCatagoryAll = Category::all();

        $array = [
            'fillCatagoryAll' => $fillCatagoryAll,
        ];

         //dd(Auth::user()->image);
        return view('guest.pages.home')->with($array);
    }


    public function getProducts($id){

        // lấy URL hiện tại trang web để xứ lý tìm sản phẩm theo id category
        // $url = url()->current();
        // $url_name = pathinfo($url, PATHINFO_BASENAME);
        // $cata = Category::where('slug', $url_name)->first();
        // $filterProductCategory = Products::where('id_ca', $cata->id)->get();
        //
        $cata = Category::where('slug', $id)->first();
        $filterProductCategory = Products::where('id_ca', $cata->id)->get();
        // dd($filterProductCategory);

        // Mảng lưu dữ liệu đê đẩy dữ liệu ra trang view
        $array = [
            'filterProductCategory' => $filterProductCategory,
            'title' => $cata->name,
        ];
        return view('guest.pages.products.product')->with($array);

    }


    public function getDetail()
    {

        return view('guest.pages.products.products-detail');
    }


    public function getAddressDefault($id_tk){
        return USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first() == null ? null : USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first();
    }
}
