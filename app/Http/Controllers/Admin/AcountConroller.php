<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ACOUNT;

class AcountConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    // {
    //     $this->admin='admin/pages/';
    //     // $this->IndexController = new IndexController;
    // }

    public function index()
    {
        //
        $prods = ACOUNT::all();
        return view('admin.pages.acounts.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.acounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $id)
    {
        $prods = ACOUNT::all();
        return view('admin.pages.acounts.index', compact('prods'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        // $prods = ACOUNT::all();
        // return view('admin.pages.acounts.view', compact('prods'));
        // $show = ACOUNT::where('id',$id)->first();
        //
        $show = ACOUNT::where('id',$id)->first();
        $array= [
            'filterAcount' => $show,
        ];
        return view('admin.pages.acounts.view')->with($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = ACOUNT::where('id',$id)->first();
        $array= [
            'filterAcount' => $prod,
        ];
       return view('admin.pages.acounts.update')->with($array);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acount $acount)
    {
        $prod = $request->all();    // $prod là 1 mảng
        $prod['slug'] = \Str::slug($request->name);

        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect()->route('admin.acounts.create')
                    ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images",$imageName);
        }
        else
        {
            // trường hợp không upload phải lấy hình cũ
            $oldItem = ACOUNT::find($acount->id);
            $imageName = $oldItem->image;
        }
        $prod['image'] = $imageName;
        //$product = new Product($prod);
        $acount->update($prod);
        return redirect()->route('admin.acounts.index');
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
