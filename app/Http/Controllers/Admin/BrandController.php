<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BRAND;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = BRAND::paginate(10);
        $array = [
            'brand' => $brand,
        ];
        return view('admin.pages.brands.index')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = $request->all();
        $request->validate(
            [
                'brand_name' => 'required',
                //'brand_name' => 'required|unique:BRAND,name',
                'brand_image' => 'mimes:jpg,png,jpeg,gif',
            ],
            [
                'brand_name.required' => 'Please input Name of Brand!',
                'brand_name.unique' => 'Brand dupplicate name!',
                'brand_image.mimes' => 'Accept image type: jpg, png, jpeg, gif!',
            ]
        );
        if ($request->hasFile('brand_image')) {
            $file = $request->file('brand_image');
            $image = $file->getClientOriginalName();
            $file->move("image/brand", $image);
        } else {
            $image = null;
        }
        $brands['brand_image'] = $image;
        $data = [
            'name' => $brands['brand_name'],
            'image' => $brands['brand_image'],
            'status' => intval($brands['brand_status']),
        ];
        // kiem tra brand co chua
        $isCheck = BRAND::where('name', $request->brand_name)->first();
        if ($isCheck == null) {
            BRAND::create($data);
            return redirect()->route('admin/brand')->with('Success', 'Create Brand success!');
        } else {
            return back()->withErrors([
                'brand_name' => 'Brand exist!'
            ])->onlyInput('brand_name');
        }
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
        $brand = BRAND::where('id', $id)->first();
        $array = [
            'brand' => $brand,
        ];
        return view('admin.pages.brands.update')->with($array);
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
        $brands = $request->all();
        $request->validate(
            [
                'brand_image' => 'mimes:jpg,png,jpeg,gif',
            ],
            [
                'brand_image.mimes' => 'Accept image type: jpg, png, jpeg, gif!',
            ]
        );

        $oldImage = BRAND::where('id', $id)->first();

        if ($image = $request->file('brand_image')) {

            $filename = $image->getClientOriginalName();
            $image->move('image/brand/', $filename);
            $brands['brand_image'] = "$filename";
        } else {
            $brands['brand_image'] = $oldImage->image;
        }
        $data = [
            'image' => $brands['brand_image'],
            'status' => intval($brands['brand_status']),
        ];        // kiem tra brand co chua
        $isCheck = BRAND::where('name', $request->brand_name)->first();
        if ($isCheck == null) {
            BRAND::where('id', $id)->update($data);
            return redirect()->route('admin/brand')->with('Success', 'Update Brand success!');
        } else {
            return back()->withErrors([
                'brand_name' => 'Brand exist!'
            ])->onlyInput('brand_name');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $brand = BRAND::where('id', $id)->first();
        // // xóa hình
        // //unlink('image/brand/' . $brand->image);
        // BRAND::destroy($id);
        // return redirect()->route('admin/brand')->with('Success', 'Delete Brand success!');
        BRAND::where('id', $id)->update(['status' => 0]);
        return back()->with('Success', 'Brand has been disabled!');
    }
}
