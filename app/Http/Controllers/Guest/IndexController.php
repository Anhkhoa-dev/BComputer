<?php

namespace App\Http\Controllers\Guest;

// Khai báo use Model
use App\Http\Controllers\Controller;
use App\Models\BRAND;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\USER_ADDRESS;
use App\Models\BANNER;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\Comment;
// use App\Models\Brands;

// kết thúc Khai báo use Model


class IndexController extends Controller
{
    // public function __construct()
    // {

    //     $this->user='guest/pages/';
    // }
    //
    public function getHome()
    {
        $lts_Catagory = $this->getCatagory();
        $featuredProducts = $this->getFeatured();
        // get sản phẩm có giảm giá >= 15% ra trang home
        $bigDiscount = $this->getDiscount();
        $banner = $this->getBanner();
        session()->forget('voucherKH');
        session()->forget('codeOrder');
        if (Auth::user()) {
            $qtyCart = Cart::where('id_tk', Auth::user()->id)->sum('quanity');
            session()->put('qtyCart', intval($qtyCart));
        }

        $array = [
            'list_Catagory' => $lts_Catagory,
            'list_Featured' => $featuredProducts,
            'bigDiscount' => $bigDiscount,
            'banner' => $banner,
        ];
        return view('guest.pages.home')->with($array);
    }

    public function aboutus()
    {
        return view('guest.pages.aboutUs');
    }

    public function contact()
    {
        return view('guest.pages.contact');
    }

    public function deliverypolicy()
    {
        return view('guest.pages.deliverypolicy');
    }

    public function warrantypolicy()
    {
        return view('guest.pages.warrantypolicy');
    }

    public function paymentpolicy()
    {
        return view('guest.pages.paymentpolicy');
    }

    public function getBanner(){
        $bannerList = BANNER::where('status', 1)->get();
        return $bannerList;
    }

    public function getDiscount($max = 10)
    {
        $bigDiscount = Products::where('discount', '>=', 15)->where('status', 1)->where('quantity', '>', 0)->limit($max)->get();
        foreach ($bigDiscount as $i => $key) {
            if ($key->id) {
                $bigDiscount[$i]->image = ProductImage::where('id_pro', $key->id)->get();
            } else {
                $bigDiscount[$i]->image = '';
            }
        }

        return $bigDiscount;
    }
    public function getCatagory()
    {
        $fillCatagoryAll = Category::where('status', 1)->get();
        return $fillCatagoryAll;
    }

    public function getFeatured($max = 10)
    {

        $lst_featured = Products::where('featured', 1)->where('status', 1)->where('quantity', '>', 0)->limit($max)->get();
        foreach ($lst_featured as $i => $key) {
            if ($key->id) {
                $lst_featured[$i]->image = ProductImage::where('id_pro', $key->id)->get();
            } else {
                $lst_featured[$i]->image = '';
            }
        }

        return $lst_featured;
    }


    public function getProducts($slug)
    {
        $cata = Category::where('slug', $slug)->first();
        $filterProductCategory = Products::where('id_ca', $cata->id)->where('status', 1)->where('quantity', '>', 0)->get();
        foreach ($filterProductCategory as $i => $key) {
            if ($key->id) {
                $filterProductCategory[$i]->image = ProductImage::where('id_pro', $key->id)->get();
            } else {
                $filterProductCategory[$i]->image = '';
            }
        }
        // dd($filterProductCategory);
        // Mảng lưu dữ liệu đê đẩy dữ liệu ra trang view
        $array = [
            'listProductByCategory' => $filterProductCategory,
            'title' => $cata->name,
        ];
        return view('guest.pages.products.product')->with($array);
    }


    public function getDetail($slug)
    {

        $prod = Products::where('slug', $slug)->first();
        $collections = Category::where('id', $prod->id_ca)->first();
        $prodImage = ProductImage::where('id_pro', $prod->id)->get();
        $comment = Comment::where('id_pro', $prod->id)->get();
        $related = Products::where('id_ca', '=', $prod->id_ca)->limit(10)->get();
        foreach ($related as $i => $key) {
            if ($key->id) {
                $related[$i]->image = ProductImage::where('id_pro', $key->id)->get();
            } else {
                $related[$i]->image = '';
            }
        }
        $same_price = Products::where('price', '=', $prod->price)->limit(10)->get();
        foreach ($same_price as $i => $key) {
            if ($key->id) {
                $same_price[$i]->image = ProductImage::where('id_pro', $key->id)->get();
            } else {
                $same_price[$i]->image = '';
            }
        }
        $listBrands = $this->getBrand();

        $array = [
            'collections' => $collections,
            'prod' => $prod,
            'image' => $prodImage,
            'comment' => $comment,
            'listRelated' => $related,
            'listSamePrice' => $same_price,
            'listBrands' => $listBrands,
        ];
        //  dd($array);
        return view('guest.pages.products.products-detail')->with($array);
    }

    public function getBrand()
    {
        $listBrands = BRAND::all();
        return $listBrands;
    }


    public function getAddressDefault($id_tk)
    {
        return USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first() == null ? null : USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first();
    }
}
