<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImage;

class IndexController extends Controller
{
    //

    public function ajaxSearch()
    {
        $data = Products::search()->get();
        foreach ($data as $key => $item) {
            if ($item->id) {
                $data[$key]->image = ProductImage::where('id_pro', $item->id)->first()->image;
            } else {
                $data[$key]->image = '';
            }
        }
        $array = [
            'data' => $data,
            'qtySearch' => count($data),
        ];


        return $array;
    }
}
