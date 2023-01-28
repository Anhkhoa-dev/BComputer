<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BANNER;
use App\Models\Category;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function banner($slug)
    // {
    //     $prod = BANNER::where('slug', '=', $slug)->first();
    //     return view('fe.banner', compact(
    //         'prod'
    //     ));
    // }

    public function index()
    {
        $prods = BANNER::all();
        return view('admin.pages.banners.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fillCatagoryAll = Category::all();

        $array = [
            'fillCatagoryAll' => $fillCatagoryAll,
        ];

         //dd(Auth::user()->image);
       // return view('guest.pages.home')->with($array);
        return view('admin.pages.banners.create')->with($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'title' => 'required',
        //         'description' => 'required',
        //         'image' => 'required|image|mimes: png,jpg,jpeg',
        //         'link' => 'required',
        //         'status' => 'required',
        //     ],
        //     [
        //         'title.required' => 'Vui lòng nhập vào title',
        //         'description.required' => 'Vui lòng nhập vào description',
        //         'image.required.mimes' => 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg',
        //         'link.required' => 'Vui lòng nhập vào link',
        //         'status.required' => 'Vui lòng nhập vào status',
        //     ],
        // );
        // $data = [
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'link' => $request->link,
        //     'status' => $request->status,
        // ];

        // //dd($data);

        // BANNER::create($data);
        // // return view('admin.pages.banners.index');

        $prod = $request->all();    // $prod là 1 mảng
        dd($prod);
        $prod['slug'] = \Str::slug($request->name);

        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect()->route('admin/banner/create')
                    ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $image = $file->getClientOriginalName();
            $file->move("image/banner",$image);
        }else
        {
            $image = null;
        }
        $prod['image'] = $image;
        $banner = new BANNER($prod);
        $banner->save();
        //dd($prod);
        return redirect()->route('admin/banner');
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
        $fillCatagoryAll = Category::all();

        $array = [
            'fillCatagoryAll' => $fillCatagoryAll,
        ];
        $banner = BANNER::find($id);
        return view('admin.pages.banners.update', compact('banner'))->with($array);
        // ->with($array)
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
        $prod = $request->all();    // $prod là 1 mảng
        $banner = BANNER::find($id);
        $banner->update($prod);
        //$prod['slug'] = \Str::slug($request->name);
        //dd($prod);
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect()->route('admin/banner/edit')
                    ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $image = $file->getClientOriginalName();
            $file->move("image/banner",$image);
        }
        else
        {
            // trường hợp không upload phải lấy hình cũ
            $oldItem = BANNER::find($banner->id);
            $image = $oldItem->image;
        }
        $prod['image'] = $image;

        $banner->save($prod);

        return redirect()->route('admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = BANNER::find($id);
        $banner->delete();
        return redirect()->route('admin/banner');

            //
            // BANNER::where('id', $id)->update(['status' => 0]);
            // return back()->with('success', 'Delete product success!');

    }
}
