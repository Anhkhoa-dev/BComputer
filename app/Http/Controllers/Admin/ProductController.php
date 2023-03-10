<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BRAND;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SUPPLIER;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_product = Products::search()->paginate(20);
        //dd($list_product);
        foreach ($list_product as $i => $key) {
            if ($key->id_ca) {
                $list_product[$i]->category = Category::find($key->id_ca)->name;
            } else {
                $list_product[$i]->category = '';
            }
            if ($key->sup_id) {
                $list_product[$i]->supplier = SUPPLIER::find($key->sup_id)->name;
            } else {
                $list_product[$i]->supplier = '';
            }

            if ($key->id_brand) {
                $list_product[$i]->brand = BRAND::find($key->id_brand)->name;
            } else {
                $list_product[$i]->brand = '';
            }



            if ($key->id) {
                $list_product[$i]->image = ProductImage::where('id_pro', $key->id)->first()->image;
            } else {
                $list_product[$i]->image = '';
            }
        }



        $array = [
            'productAll' => $list_product,
        ];
        return view('admin.pages.products.index')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::where('status', 1)->get();
        $brands = BRAND::all();
        $supplier = SUPPLIER::all();
        $array = [
            'category' => $category,
            'brands' => $brands,
            'supplier' => $supplier,
        ];
        return view('admin.pages.products.create')->with($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prods = $request->all();
        $request->validate(
            [
                'pro_name' => 'required',
                'pro_price' => 'required',
                'pro_discount' => 'required',
                'pro_desc' => 'required',
                'pro_image' => 'required',
            ],
            [
                'pro_name.required' => 'Please input name of product',
                'pro_price.required' => 'Please input price of product',
                'pro_discount.required' => 'Please input discount of product ',
                'pro_desc.required' => 'Please input description of product!',
                'pro_image.required' => 'Please choose image!',
            ]
        );
        $cauhinh = [
            'cauhinh_cpu' => $prods['cauhinh_cpu'],
            'cauhinh_ram' => $prods['cauhinh_ram'],
            'cauhinh_Storage' => $prods['cauhinh_Storage'],
            'cauhinh_graphic_card' => $prods['cauhinh_graphic_card'],
            'cauhinh_screen' => $prods['cauhinh_screen'],
            'cauhinh_keyboard' => $prods['cauhinh_keyboard'],
            'cauhinh_Audio' => $prods['cauhinh_Audio'],
            'cauhinh_wireless' => $prods['cauhinh_wireless'],
            'cauhinh_webcam' => $prods['cauhinh_webcam'],
            'cauhinh_usb' => $prods['cauhinh_usb'],
            'cauhinh_window' => $prods['cauhinh_window'],
            'cauhinh_power' => $prods['cauhinh_power'],
        ];

        $url = 'json/' . Str::slug($prods['pro_name']) . '.json';
        $json = json_encode($cauhinh);
        file_put_contents($url, $json);

        //dd($cauhinh);


        $data = [
            'name' => $prods['pro_name'],
            'slug' => Str::slug($prods['pro_name']),
            'id_ca' => intval($prods['pro_category']),
            'discount' => intval($prods['pro_discount']),
            'sup_id' => intval($prods['pro_supplier']),
            'description' => $prods['pro_desc'],
            'price' => number_format(intval($prods['pro_price']) / 23000, 2),
            'quantity' => intval($prods['pro_quantity']),
            'cauhinh' => Str::slug($prods['pro_name']) . '.json',
            'id_brand' => intval($prods['pro_brand']),
            'featured' => intval($prods['pro_featured']),
            'create_date' => date_format(Carbon::now(), 'Y-m-d H:i'),
            'status' => intval($prods['pro_active']),
        ];

        $kiemtraName = Products::where('name', $prods['pro_name'])->first();

        if ($kiemtraName != null) {
            return back()->withErrors([
                'pro_name' => 'Product dupplicate name'
            ])->onlyInput('pro_name');
        } else {
            Products::create($data);
            $product_img = Products::where('name', $data['name'])->first();
            if ($request->hasfile('pro_image')) {
                foreach ($request->file('pro_image') as $file) {
                    $fileName = $file->getClientOriginalName();
                    $file->move("image/product", $fileName);
                    ProductImage::create([
                        'id_pro' => $product_img->id,
                        'image' => $fileName,
                    ]);
                }
            }
            return redirect('admin/product')->with('success_message', 'Th??m s???n ph???m m???i th??nh c??ng!');
        }
    }

    /**
     * Display the specified resource.
     *     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::where('slug', $id)->first();
        $productImg = ProductImage::where('id_pro', $product->id)->get();
        if ($product->id_ca) {
            $product->category = Category::find($product->id_ca);
        } else {
            $product->category = '';
        }
        if ($product->sup_id) {
            $product->supplier = SUPPLIER::find($product->sup_id);
        } else {
            $product->supplier = '';
        }

        if ($product->id_brand) {
            $product->brand = BRAND::find($product->id_brand);
        } else {
            $product->brand = '';
        }
        //  dd($product);
        $data = [
            'proShow' => $product,
            'proImage' => $productImg,
        ];

        return view('admin.pages.products.detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        //tr??? v??? view
        $category = Category::where('status', 1)->get();
        $brands = BRAND::where('status', 1)->get();
        $supplier = SUPPLIER::where('status', 1)->get();
        $prod = Products::where('id', $id)->first();
        $productImg = ProductImage::where('id_pro', $prod->id)->get();
        if ($prod->id_ca) {
            $prod->category = Category::find($prod->id_ca);
        } else {
            $prod->category = '';
        }
        if ($prod->sup_id) {
            $prod->supplier = SUPPLIER::find($prod->sup_id);
        } else {
            $prod->supplier = '';
        }
        if ($prod->id_brand) {
            $prod->brand = BRAND::find($prod->id_brand);
        } else {
            $prod->brand = '';
        }
        $array = [
            'proShow' => $prod,
            'category' => $category,
            'brands' => $brands,
            'supplier' => $supplier,
            'prod' => $prod,
            'message' => 'B???n ???? ????ng nh???p th??nh c??ng',
            'proImage' => $productImg,
        ];
        // dd($array);
        return view('admin.pages.products.edit')->with($array);
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
        $prods = $request->all();
        $product_img = Products::where('id', $id)->first();
        $oldImage = Products::where('id', $id)->first();
        if ($request->hasfile('pro_image')) {
            foreach ($request->file('pro_image') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move("image/product", $fileName);
                ProductImage::create([
                    'id_pro' => $product_img->id,
                    'image' => $fileName,
                ]);
            }
        } else {
            $prods['pro_image'] = $oldImage->image;
        }

        $data = [
            'name' => $prods['pro_name'],
            'slug' => Str::slug($prods['pro_name']),
            'id_ca' => intval($prods['pro_category']),
            'discount' => intval($prods['pro_discount']),
            'sup_id' => intval($prods['pro_supplier']),
            'description' => $prods['pro_desc'],
            'price' => floatval($prods['pro_price']),
            'quantity' => intval($prods['pro_quantity']),
            'cauhinh' => null,
            'id_brand' => intval($prods['pro_brand']),
            'featured' => intval($prods['pro_featured']),
            'status' => intval($prods['pro_active']),
        ];
        //dd($data);
        Products::where('id', $id)->update($data);
        return redirect('admin/product');
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
        Products::where('id', $id)->update(['status' => 0]);
        return back()->with('success', 'Delete product success!');
    }
}
