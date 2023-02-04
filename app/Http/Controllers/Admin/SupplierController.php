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
        // $prod = $request->all();
        // $request->validate(
        //     [
        //         'sup_name' => 'required',
        //         'sup_address' => 'required',
        //         'sup_phone' => 'required',
        //         'sup_email' => 'required',
        //         // 'image' => 'required',
        //     ],
        //     [
        //         'sup_name.required' => 'Please input name of supplier',
        //         'sup_address.required' => 'Please input address ',
        //         'sup_phone.required' => 'Please input phone  ',
        //         'sup_email.required' => 'Please input email',
        //         // 'image.required' => 'Please choose image!',
        // ]);

        // $prod['slug'] = \Str::slug($request->name);
        // if($request->hasFile('photo'))
        // {
        //     $file=$request->file('photo');
        //     $extension = $file->getClientOriginalExtension();
        //     if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
        //     {
        //         return redirect()->route('supplier/create')
        //             ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
        //     }
        //     $image = $file->getClientOriginalName();
        //     $file->move("images",$image);
        // }
        // else
        // {
        //     $image = null;
        // }
        // $prod['image'] = $image;
        // $supplier = new SUPPLIER($prod);
        // $supplier->save();
        // return redirect()->route('admin/supplier');

        // $prods = $request->all();
        // dd($prods);
        // $request->validate(
        //     [
        //         'sup_name' => 'required',
        //         'sup_address' => 'required',
        //         'sup_phone' => 'required',
        //         'sup_email' => 'required',
        //         // 'image' => 'required',
        //     ],
        //     [
        //         'sup_name.required' => 'Please input name of supplier',
        //         'sup_address.required' => 'Please input address ',
//         'sup_phone.required' => 'Please input phone  ',
        //         'sup_email.required' => 'Please input email',
        //         // 'image.required' => 'Please choose image!',
        // ]);
   $prods = $request->all();
        // dd($prods);
           $request->validate(
            [
                'sup_name' => 'required',
                'sup_address' => 'required',
                'sup_phone' => 'required',
                'sup_email' => 'required',
                //'photo' => 'required',
            ],
            [
                'sup_name.required' => 'Please input name of supplier',
                'sup_address.required' => 'Please input address ',
                'sup_phone.required' => 'Please input phone  ',
                'sup_email.required' => 'Please input email',
                //'photo.required' => 'Please choose image!',
        ]);
        if($file = $request->file('photo'))
        {
        //    $file =$request->file('photo');
        //    $image =$file->getClientOriginalName();
        //    $file->move("image/supplier/" ,$image);

           $fileName = $file->getClientOriginalName();
           $file->move('image/supplier/', $fileName);
           $prods['image'] = "$fileName";
        }
        else{
            $image = null;
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
        SUPPLIER::create($data);
        return redirect()->route('admin/supplier');
     
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
        $prod = SUPPLIER::where('id', $id)->first();
        $array = [
            'prod' => $prod,
            'message' => 'Bạn đã đăng nhập thành công',
        ];
        // dd($array);
        return view('admin.pages.suppliers.create')->with($array);

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
            $request->validate(
                [
                    'sup_name' => 'required',
                    'sup_address' => 'required',
                    'sup_phone' => 'required',
                    'sup_email' => 'required',
                    // 'image' => 'required',
                ],
                [
                    'sup_name.required' => 'Please input name of supplier',
                    'sup_address.required' => 'Please input address ',
                    'sup_phone.required' => 'Please input phone  ',
                    'sup_email.required' => 'Please input email',
                    // 'image.required' => 'Please choose image!',
            ]);

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
