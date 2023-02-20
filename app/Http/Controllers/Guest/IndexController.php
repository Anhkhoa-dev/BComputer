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
use Carbon\Carbon;

// use Illuminate\Support\Facades\DB;

// kết thúc Khai báo use Model


class IndexController extends Controller
{

    public function getHome()
    {
        $lts_Catagory = $this->getCatagory();
        session()->put('list_Catagory', $lts_Catagory);
        $featuredProducts = $this->getFeatured();
        // get sản phẩm có giảm giá >= 15% ra trang home
        $bigDiscount = $this->getDiscount();
        $banner = $this->getBanner();
        $newProduct = $this->getNewProducts();
        session()->forget('voucherKH');
        session()->forget('codeOrder');
        session()->forget('dataLisTraCuu');
        if (Auth::user()) {
            $qtyCart = Cart::where('id_tk', Auth::user()->id)->sum('quanity');
            session()->put('qtyCart', intval($qtyCart));
        }

        $array = [
            'list_Catagory' => $lts_Catagory,
            'list_Featured' => $featuredProducts,
            'bigDiscount' => $bigDiscount,
            'newproduct' => $newProduct,
            'banner' => $banner,
            'logoBrand' => BRAND::where('status', 1)->get(),
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

    public function errorpage()
    {
        return view('guest.pages.error-page');
    }
    public function commingsoon()
    {
        return view('guest.pages.commingsoon');
    }

    public function getBanner()
    {
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
    // hàm get lay61 những sản phẩm trong vòng 1 tháng mới ra mắt

    public function getNewProducts($max = 15)
    {

        $date_current = Carbon::now()->subDays(10);
        //dd($date_current);
        $newProducts = Products::where('create_date', '>=', date_format($date_current, 'Y-m-d H:s'))->where('status', 1)->where('quantity', '>', 0)->limit($max)->get();
        foreach ($newProducts as $i => $key) {
            if ($key->id) {
                $newProducts[$i]->image = ProductImage::where('id_pro', $key->id)->first()->image;
            } else {
                $newProducts[$i]->image = '';
            }
        }
        //dd($newProducts);
        return $newProducts;
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
                $lst_featured[$i]->image = ProductImage::where('id_pro', $key->id)->first()->image;
            } else {
                $lst_featured[$i]->image = '';
            }
        }

        return $lst_featured;
    }

    // public function ajaxTraCuuList(Request $request)
    // {

    //     $data = Products::search()->get();
        
    //     foreach ($data as $i => $item) {
    //         if ($item->id) {
    //             $data[$i]->image = ProductImage::where('id_pro', $item->id)->first()->image;
    //         } else {
    //             $data[$i]->image = '';
    //         }
    //     }
    //     // print_r($data);
    //     // print_r(count($data))

    //     return view('guest.pages.list-search-product', compact('data'));
    // }

    public function ajaxTraCuu(Request $request)
    {
        $data = Products::search()->get();
        foreach ($data as $key => $item) {
            if ($item->id) {
                $data[$key]->image = ProductImage::where('id_pro', $item->id)->first()->image;
            } else {
                $data[$key]->image = '';
            }
        }

        return view('guest.pages.search.ajax-search', compact('data'));
    }


    public function getProducts($slug)
    {
        $cata = Category::where('slug', $slug)->first();
        $filterProductCategory = Products::where('id_ca', $cata->id)->where('status', 1)->where('quantity', '>', 0)->paginate(20);
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
        $related = Products::where('id_ca', $prod->id_ca)->limit(10)->get();
        $nameCauHinh = Products::where('id', $prod->id)->first()->cauhinh;
        if ($nameCauHinh != null) {
            $cauhinh = json_decode(file_get_contents('json/' . Products::where('id', $prod->id)->first()->cauhinh), true);
        } else {
            $cauhinh = '';
        }
        // $cauhinh = ;

        //dd($cauhinh);
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
            'cauhinh' => $cauhinh,
        ];
        //  dd($array);
        return view('guest.pages.products.products-detail')->with($array);
    }

    public function getBrand()
    {
        $listBrands = BRAND::all();
        return $listBrands;
    }


    // public function getAddressDefault($id_tk)
    // {
    //     return USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first() == null ? null : USER_ADDRESS::where('id_tk', $id_tk)->where('status', 1)->first();
    // }
}
