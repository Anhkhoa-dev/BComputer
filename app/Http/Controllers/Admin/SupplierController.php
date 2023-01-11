<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SUPPLIER;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prods = SUPPLIER::all();
        return view('admin.pages.suppliers.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Lấy view show ra
        return view('admin.pages.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //xử lý create
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //hiển thị view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //trả về view
        $url = pathinfo(url()->current(), PATHINFO_BASENAME);
        $supplier = SUPPLIER::where('id', $url)->first();
        $array= [
            'supplierEdit' => $supplier,

        ];
        
            // return view('admin.pages.suppliers.edit', compact('id'));
        return view('admin.pages.suppliers.edit')->with($array);
        
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
        $prod = $request->all();    // $prod là 1 mảng
        $prod['slug'] = \Str::slug($request->name);
        
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect()->route('admin.product.create')
                    ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images",$imageName);
        }
        else
        {
            // trường hợp không upload phải lấy hình cũ
            $oldItem = SUPPLIER::find($product->id);
            $imageName = $oldItem->image;
        }
        $prod['image'] = $imageName;
        //$product = new Product($prod);
        $product->update($prod);
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SUPPLIER $id)
    {
        //xử lý xóa
        $id->delete();
        return redirect()->route('admin.pages.suppliers.index');
    }
}
