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
        $product = Products::paginate(6);;
        foreach ($product as $i => $key) {
            if ($key->id) {
                $product[$i]->image = ProductImage::where('id_pro', $key->id)->count('id');
            } else {
                $product[$i]->image = '';
            }
        }

        //dd($product);
        // foreach ($list_product as $i => $key) {
        //     if ($key->id_ca) {
        //         $list_product[$i]->category = Category::find($key->id_ca)->name;
        //     } else {
        //         $list_product[$i]->category = '';
        //     }
        //     if ($key->sup_id) {
        //         $list_product[$i]->supplier = SUPPLIER::find($key->sup_id)->name;
        //     } else {
        //         $list_product[$i]->supplier = '';
        //     }

        //     if ($key->id_brand) {
        //         $list_product[$i]->brand = BRAND::find($key->id_brand)->name;
        //     } else {
        //         $list_product[$i]->brand = '';
        //     }
        //     if ($key->id) {
        //         $list_product[$i]->image = ProductImage::where('id_pro', $key->id)->first()->image;
        //     } else {
        //         $list_product[$i]->image = '';
        //     }
        // }
        $array = [
            'prodImg' => $product,
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
