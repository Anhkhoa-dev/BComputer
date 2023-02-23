<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Products;

class ProductimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $prodImg = ProductImage::paginate(6);
        $product = Products::paginate(15);
        foreach ($product as $i => $key) {
            if ($key->id) {
                $product[$i]->image = ProductImage::where('id_pro', $key->id)->count('id');
            } else {
                $product[$i]->image = '';
            }
            if ($key->id) {
                //$product[$i]->nameImg = ProductImage::all();
                $product[$i]->nameImg = ProductImage::where('id_pro', $key->id)->first();
            } else {
                $product[$i]->nameImg = '';
            }
        }
        //dd($product->nameImg );
        $productImg = ProductImage::where('id_pro', $key->id)->get();
        $array = [
            'prodImg' => $product,
            'productImg' => $productImg
        ];
        return view('admin.pages.productImage')->with($array);
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
        $prod = Products::where('id', $id)->first();
        $productImg = ProductImage::where('id_pro', $prod->id)->get();
        $array = [
            'prod' => $prod,
            'productImg' => $productImg,
        ];
        //dd($array);
        return view('admin.pages.ProductImageShow')->with($array);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
