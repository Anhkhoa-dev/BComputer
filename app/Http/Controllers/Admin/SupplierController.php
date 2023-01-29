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
          // $prod = new Product();
        // $prod->name = $request->name;
        // $prod->short_desc = $request->short_desc;
        // using mass assignment


        $prod = $request->all();
           // $prod là 1 mảngz
        $prod['slug'] = \Str::slug($request->name);
        
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect()->route('supplier/create')
                    ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $image = $file->getClientOriginalName();
            $file->move("images",$image);
        }
        else
        {
            $image = null;
        }
        $prod['image'] = $image;
        $supplier = new SUPPLIER($prod);
        $supplier->save();
        return redirect()->route('admin/supplier');

        // $prods = SUPPLIER::all();
        // return view('admin.pages.suppliers.index', compact('prods'));
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
    public function edit($id)
    {
        //trả về view
        // $url = pathinfo(url()->current(), PATHINFO_BASENAME);
        // $supplier = SUPPLIER::where('id', $url)->first();
        // $array = [
        //     'supplierEdit' => $supplier,
        // ];
        // return view('admin.pages.suppliers.edit')->with($array);


        $prod = SUPPLIER::where('id', $id)->first();
        $array = [
            'prod' => $prod,
            'message' => 'Bạn đã đăng nhập thành công',
        ];
        // dd($array);
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
            $prods = $request->all();
            $oldImage = SUPPLIER::where('id', $id)->first();
            if ($file = $request->file('photo'))
            {
                $fileName = $file->getClientOriginalName();
                $file->move('image/supplier/', $fileName);
                $prods['image'] = "$fileName";
            }else{
                
                $prods['image'] = $oldImage->image;
            }
            $data = [
                'name' => $prods['sup_name'],
                'image' => $prods['image'],
                'address'=> $prods['sup_address'],
                'phone'=> $prods['sup_phone'],
                'email'=> $prods['sup_email'],
                'status'=> intval($prods['loai_tk']),
            ];
            //dd($data);
            SUPPLIER::where('id', intval($prods['sup_id']))->update($data);
            return redirect()->route('admin/supplier');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = SUPPLIER::find($id);
        $p->delete();
        return redirect()->route('admin/supplier');
    }
}
